<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Demografi Jemaat</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 11px; color: #333; line-height: 1.4; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px; }
        .header h1 { margin: 0; font-size: 18px; color: #1a202c; }
        .header p { margin: 5px 0 0; color: #718096; }
        
        .section-title { background: #edf2f7; padding: 5px 10px; font-weight: bold; font-size: 12px; margin-top: 20px; border-left: 4px solid #4a5568; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #f8fafc; color: #64748b; font-weight: bold; text-align: left; padding: 8px; border: 1px solid #e2e8f0; text-transform: uppercase; font-size: 9px; }
        td { padding: 8px; border: 1px solid #e2e8f0; vertical-align: top; }
        
        .stats-grid { width: 100%; margin-top: 10px; }
        .stats-box { border: 1px solid #e2e8f0; padding: 10px; text-align: center; width: 23%; float: left; margin-right: 1%; border-radius: 5px; }
        .stats-label { display: block; color: #718096; font-size: 9px; text-transform: uppercase; margin-bottom: 5px; }
        .stats-value { display: block; font-size: 16px; font-weight: bold; color: #2d3748; }
        
        .clearfix { clear: both; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .badge { padding: 2px 5px; border-radius: 3px; font-size: 9px; font-weight: bold; }
        .bg-blue { background: #ebf8ff; color: #2b6cb0; }
        .bg-orange { background: #fffaf0; color: #9c4221; }
        
        .stats-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 10px 0; /* Memberi jarak antar box (pengganti margin) */
        margin-left: -10px; /* Kompensasi spacing agar rata kiri */
        }
        .stats-box-td {
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            width: 25%; /* Bagi rata 4 box */
            background-color: #ffffff;
        }
        .stats-label { 
            display: block; 
            color: #718096; 
            font-size: 9px; 
            text-transform: uppercase; 
            margin-bottom: 5px; 
            font-weight: bold;
        }
        .stats-value { 
            display: block; 
            font-size: 16px; 
            font-weight: bold; 
            color: #2d3748; 
        }

        .birthday-table td { font-size: 10px; padding: 6px; }
        .text-muted { color: #718096; font-size: 9px; }
        .highlight-date { font-weight: bold; color: #2d3748; }
        .no-data { text-align: center; color: #a0aec0; font-style: italic; padding: 20px; border: 1px dashed #e2e8f0 !important; }

        footer { position: fixed; bottom: -30px; left: 0; right: 0; height: 30px; text-align: center; color: #a0aec0; font-size: 9px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>LAPORAN DATA DEMOGRAFI JEMAAT</h1>
        <p>Periode Minggu Ini: {{ $rentang_tgl }} | Dicetak pada: {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <table class="stats-table">
        <tr>
            <td class="stats-box-td">
                <span class="stats-label">Total Keluarga</span>
                <span class="stats-value">{{ $total_family }}</span>
            </td>
            <td class="stats-box-td">
                <span class="stats-label">Total Jemaat</span>
                <span class="stats-value">{{ $total_member }}</span>
            </td>
            <td class="stats-box-td">
                <span class="stats-label">Laki-laki</span>
                <span class="stats-value">{{ $pria }}</span>
            </td>
            <td class="stats-box-td">
                <span class="stats-label">Perempuan</span>
                <span class="stats-value">{{ $wanita }}</span>
            </td>
        </tr>
    </table>
    <div class="clearfix"></div>

    <table style="margin-top: 20px;">
        <tr>
            <td style="width: 40%; border: none; padding-left: 0;">
                <div class="section-title">SEKTOR JEMAAT</div>
                <table>
                    <tr><th>Sektor</th><th>Jumlah Jiwa</th></tr>
                    <tr><td>Sektor 1</td><td class="text-center">{{ $sektor_1 }}</td></tr>
                    <tr><td>Sektor 2</td><td class="text-center">{{ $sektor_2 }}</td></tr>
                </table>
            </td>
            <td style="width: 60%; border: none; padding-right: 0;">
                <div class="section-title">PELAYANAN KATEGORIAL (PELKAT)</div>
                <table>
                    <tr>
                        @foreach($kategori as $key => $val) <th>{{ $key }}</th> @endforeach
                    </tr>
                    <tr>
                        @foreach($kategori as $val) <td class="text-center">{{ $val }}</td> @endforeach
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="section-title">DAFTAR HARI ULANG TAHUN & PERNIKAHAN ({{ $rentang_tgl }})</div>
    <table style="width: 100%; border: none;">
        <tr>
            <td style="width: 50%; border: none; padding-left: 0;">
                <p style="font-weight: bold; margin-bottom: 5px;">Ulang Tahun Kelahiran</p>
                <table class="birthday-table">
                    <thead>
                        <tr>
                            <th style="width: 70%;">Nama Jemaat</th>
                            <th style="text-right">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ultah_jemaat as $ultah)
                        <tr>
                            <td>
                                {{ $ultah->nama_pertama }} {{ $ultah->nama_belakang }}<br>
                                <span class="text-muted">{{ $ultah->kategori }} - Sektor {{ $ultah->family->sektor ?? '-' }}</span>
                            </td>
                            <td class="text-right highlight-date">
                                {{ \Carbon\Carbon::parse($ultah->tgl_lahir)->format('d M') }}
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="no-data">Tidak ada HUT minggu ini</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </td>

            <td style="width: 50%; border: none; padding-right: 0;">
                <p style="font-weight: bold; margin-bottom: 5px;">Ulang Tahun Pernikahan</p>
                <table class="birthday-table">
                    <thead>
                        <tr>
                            <th style="width: 70%;">Keluarga</th>
                            <th style="text-right">Tanggal Menikah</th>
                            <th style="text-right">Usia Pernikahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ultah_nikah as $nikah)
                        <tr class="hover:bg-rose-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $nikah->nama_pertama }} {{ $nikah->nama_belakang }} 
                                <span class="text-xs text-gray-400 block">Keluarga: {{ $nikah->family->nama_keluarga ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-center">
                                <span class="badge bg-white border border-rose-300 text-rose-700 px-2 py-1 rounded font-bold">
                                    {{ $nikah->tgl_nikah_gereja->format('d M') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 text-center">
                                {{-- Hitung selisih tahun nikah sampai tahun ini --}}
                                Ke-{{ now()->year - $nikah->tgl_nikah_gereja->year }}
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="no-data">Tidak ada HWA minggu ini</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    
    <div class="section-title">SEBARAN WILAYAH (KODEPOS)</div>
    <table>
        <thead>
            <tr>
                <th>Kodepos</th>
                <th>Kelurahan / Wilayah</th>
                <th>Kecamatan</th>
                <th class="text-right">Jumlah Jiwa</th>
                <th class="text-right">Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demografi_kodepos as $kodepos => $data)
            <tr>
                <td>{{ $kodepos == 'BELUM DIISI' ? '-' : $kodepos }}</td>
                <td>{{ $kodepos == 'BELUM DIISI' ? 'ALAMAT BELUM LENGKAP' : ($data['village'] ?? 'N/A') }}</td>
                <td>{{ $data['district'] ?? '-' }}</td>
                <td class="text-right">{{ $data['total'] }}</td>
                <td class="text-right">{{ number_format(($data['total'] / $total_member) * 100, 1) }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="section-title">GOLONGAN DARAH</div>
    <table>
        <tr>
            @foreach(['A', 'B', 'AB', 'O'] as $g)
                <th class="text-center">{{ $g }}</th>
            @endforeach
            <th class="text-center">NULL</th>
        </tr>
        <tr>
            @foreach(['A', 'B', 'AB', 'O'] as $g)
                <td class="text-center">{{ $demografi_goldar[$g] ?? 0 }}</td>
            @endforeach
            <td class="text-center" style="color: #c53030;">{{ $goldar_kosong }}</td>
        </tr>
    </table>

    

    <footer>
        Halaman 1 dari 1 - Dokumen ini dihasilkan secara otomatis oleh Sistem Jemaat Sangkakala
    </footer>

</body>
</html>