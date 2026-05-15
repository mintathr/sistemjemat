<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Province;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
    // eager loading
        $members = Member::with('family')->get();
        return view('members.index', compact('members'));
    }

    public function majelis()
    {
        $majelis = Member::whereNotNull('posisi_jabatan')
                        ->where('posisi_jabatan', '!=', '-')
                        ->orderBy('nama_pertama', 'asc')
                        ->get();

        return view('members.list_majelis', compact('majelis'));
    }

    public function pelkat()
    {
        $members = Member::whereNotNull('pengurus_pelkat')
                        ->orderBy('pengurus_pelkat')
                        ->get();

        $pelkatGroups = $members->groupBy('pengurus_pelkat');

        return view('members.list_pelkat', compact('pelkatGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        #$families = Family::all();
        #return view('members.create', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $validated = $request->validate([
            'family_id'     => 'required|exists:families,id',
            'no_induk'      => 'required|unique:members',
            'nama_pertama'  => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            // Validasi Enum: S atau B
            'status_baptis' => 'nullable|in:S,B',
            'status_sidi'   => 'nullable|in:S,B',
        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil didaftarkan!'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        $member->load('family');
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        $provinces = Province::orderBy('name')->get();

        return view('members.edit', compact('member', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            #'nama_pertama' => 'required|string',
            #'nama_belakang' => 'nullable|string',
            'jenis_kelamin' => 'required|in:L,P',
            'hubungan_keluarga' => 'nullable|in:KK,IS,AN,OT,CU,KA,MN,FA',
            'tempat_lahir' => 'nullable|exists:provinces,code',
            'tanggal_lahir' => 'nullable|date',
            'status_baptis' => 'nullable|in:S,B',
            'tempat_baptis' => 'nullable|string',
            'tanggal_baptis' => 'nullable|date',
            'status_sidi' => 'nullable|in:S,B',
            'tempat_sidi' => 'nullable|string',
            'tanggal_sidi' => 'nullable|date',
            'status_nikah' => 'nullable|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'tgl_nikah_gereja' => 'nullable|date',
            'tgl_nikah_sipil' => 'nullable|date',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'pendidikan_terakhir' => 'nullable|string',
            'gelar' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'tempat_kerja' => 'nullable|string',
            'pengalaman_organisasi' => 'nullable|string',
            'pengalaman_gerejawi' => 'nullable|string',
            'penguasaan_bahasa_daerah' => 'nullable|string',
            'penguasaan_bahasa_asing' => 'nullable|string',
            'telp' => 'nullable|string',
            'hp' => 'nullable|string',
            'email' => 'nullable|email',
            'posisi_jabatan' => 'nullable|string',
            'pengurus_pelkat' => 'nullable|in:PELKAT-PA,PELKAT-PT,PELKAT-GP,PELKAT-PKB,PELKAT-PKP,PELKAT-PKLU',
            'profesi' => 'nullable|string',
            'riwayat_lain' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($member->photo && \Storage::disk('public')->exists($member->photo)) {
                \Storage::disk('public')->delete($member->photo);
            }
            // Upload foto baru
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
