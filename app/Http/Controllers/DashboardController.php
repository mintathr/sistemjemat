<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\Member;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private function getDashboardData(){
        $allMembers = Member::where('status_aktif', 'Aktif')->get();

        // --- LOGIKA ULANG TAHUN MINGGU INI ---
        $startOfWeek = now()->startOfWeek(); // Senin pukul 00:00
        $endOfWeek = now()->endOfWeek();     // Minggu pukul 23:59

        $ultahMingguIni = $allMembers->filter(function($member) use ($startOfWeek, $endOfWeek) {
            if (!$member->tanggal_lahir) return false;

            // Set tahun lahir jemaat ke tahun sekarang untuk perbandingan range
            $tanggalUltahTahunIni = $member->tanggal_lahir->copy()->year(now()->year);

            return $tanggalUltahTahunIni->between($startOfWeek, $endOfWeek);
        })->sortBy(function($member) {
                // Urutkan berdasarkan tanggal terdekat
                return $member->tanggal_lahir->format('m-d');
        });

        // Logika Wedding Anniversary
        $hwaNikah = $allMembers->filter(function($member) use ($startOfWeek, $endOfWeek) {
            if (!$member->tgl_nikah_gereja) return false;
            
            // Set tahun nikah ke tahun ini untuk pengecekan range
            $anniversaryTahunIni = $member->tgl_nikah_gereja->copy()->year(now()->year);
            return $anniversaryTahunIni->between($startOfWeek, $endOfWeek);
        })->sortBy(function($member) {
            return $member->tgl_nikah_gereja->format('m-d');
        });

        // Ambil distribusi kodepos dari keluarga yang punya member AKTIF
        $demografiKodepos = Family::where('status_keluarga', 'Aktif')
            // Join ke tabel kodepos agar dapat nama wilayah
            ->leftJoin('kodepos', 'families.kodepos', '=', 'kodepos.code')
            ->select('families.*', 'kodepos.village', 'kodepos.district')
            ->withCount(['members' => function($query) {
                $query->where('status_aktif', 'Aktif');
            }])
            ->get()
            // Grouping berdasarkan kodepos, village, dan district agar data wilayah tidak hilang
            ->groupBy(function($item) {
                return (empty($item->kodepos) || trim($item->kodepos) == "") ? 'BELUM DIISI' : $item->kodepos;
            })
            ->map(function ($group) {
                return [
                    'total'    => $group->sum('members_count'),
                    'village'  => $group->first()->village,  // Ambil nama kelurahan dari baris pertama group
                    'district' => $group->first()->district, // Ambil nama kecamatan dari baris pertama group
                ];
            })
            ->sortDesc(); // Urutkan dari yang paling banyak jemaatnya
            
        $demografi_goldar = Member::where('status_aktif', 'Aktif')
            ->select(DB::raw("
                CASE 
                    WHEN golongan_darah IS NULL OR golongan_darah = '' THEN 'KOSONG'
                    ELSE golongan_darah 
                END as tipe_darah
            "), DB::raw('count(*) as total'))
            ->groupBy('tipe_darah')
            ->pluck('total', 'tipe_darah'); // Menghasilkan ['A' => 10, 'B' => 5, dst]

        // Ambil angka spesifik untuk label di header
        $goldar_kosong = $demografi_goldar['KOSONG'] ?? 0;

        $demografi_pekerjaan = Member::where('status_aktif', 'Aktif')
            ->whereNotNull('pekerjaan')         
            ->where('pekerjaan', '!=', '')             
            ->select('pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('pekerjaan')
            ->orderBy('pekerjaan', 'asc')
            ->pluck('total', 'pekerjaan');
        
        // 3. Hitung Kategori dari Accessor
        // Kita kelompokkan koleksi berdasarkan attribute 'kategori'
        $kategoriGroup = $allMembers->groupBy(function($member) {
            return (string) $member->kategori; 
        })->map->count();

        // Gabungkan data
        

        $data = [
            'total_member'  => $allMembers->count(),
            'total_family'  => Family::where('status_keluarga', 'Aktif')->count(),
            'pria'          => $allMembers->where('jenis_kelamin', '=', 'L')->count(),
            'wanita'        => $allMembers->where('jenis_kelamin', '=', 'P')->count(),

            // 2. Sektor (Ambil dari relasi Family)
            'sektor_1'      => Member::whereHas('family', function($query) {
                $query->where('sektor', '1');
            })->count(),

            'sektor_2'      => Member::whereHas('family', function($query) {
                $query->where('sektor', '2');
            })->count(),
            
            'ultah_jemaat'          => $ultahMingguIni,
            'ultah_nikah'           => $hwaNikah,
            'rentang_tgl'           => $startOfWeek->format('d M') . ' - ' . $endOfWeek->format('d M Y'),
            'demografi_kodepos'     => $demografiKodepos,
            'total_jemaat_aktif'    => $allMembers->count(), // Untuk hitung persentase
            'demografi_goldar'      => $demografi_goldar,
            'demografi_pekerjaan'   => $demografi_pekerjaan,
            'goldar_kosong'         => $goldar_kosong,

            'kategori' => [
                'PA'   => $kategoriGroup->get('PA', 0),
                'PT'   => $kategoriGroup->get('PT', 0),
                'GP'   => $kategoriGroup->get('GP', 0),
                'PKP'  => $kategoriGroup->get('PKP', 0),
                'PKB'  => $kategoriGroup->get('PKB', 0),
                'PKLU' => $kategoriGroup->get('PKLU', 0),
            ],
        ];
        return $data;
    }

    public function index(){
        
        $data = $this->getDashboardData();
        return view('dashboard', $data);
    }

    public function downloadPdf(){
        $data = $this->getDashboardData();
        if (ob_get_contents()) ob_end_clean();
        $pdf = Pdf::loadView('dashboard_report', $data)
              ->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan-Jemaat-' . now()->format('Y-m-d') . '.pdf');
    }

}
