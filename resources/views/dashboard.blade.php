<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Overview
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                 <a href="{{ route('dashboard.pdf') }}" target="_blank" 
                    class="group inline-flex items-center px-5 py-2.5 bg-white border border-red-200 text-red-600 rounded-xl shadow-sm hover:bg-red-600 hover:text-white transition-all duration-200">
                    <i class="bi bi-file-earmark-pdf-fill mr-2 text-lg group-hover:scale-110 transition-transform"></i>
                    <span class="font-bold text-sm">Download Laporan Jemaat</span>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white shadow-sm rounded-lg border-l-4 border-purple-500 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <i class="bi bi-houses-fill text-purple-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 uppercase font-bold leading-none">Total Keluarga</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $total_family }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-lg border-l-4 border-blue-500 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i class="bi bi-people-fill text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 uppercase font-bold leading-none">Total Jemaat</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $total_member }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-lg border-l-4 border-green-500 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <i class="bi bi-gender-male text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 uppercase font-bold leading-none">Laki-laki</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $pria }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-lg border-l-4 border-pink-500 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-pink-100 rounded-full">
                            <i class="bi bi-gender-female text-pink-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 uppercase font-bold leading-none">Perempuan</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $wanita }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2 flex items-center">
                        <i class="bi bi-geo-alt-fill text-red-500 mr-2"></i> SEKTOR JEMAAT
                    </h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg border-b-4 border-blue-400 text-center transition hover:shadow-md">
                            <p class="text-xs text-blue-600 font-bold uppercase tracking-wider mb-1">Sektor 1</p>
                            <div class="flex items-center justify-center space-x-2">
                                <i class="bi bi-house-door text-blue-500 text-lg"></i>
                                <p class="text-3xl font-black text-gray-800">{{ $sektor_1 }}</p>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-1">Total Jemaat</p>
                        </div>

                        <div class="bg-indigo-50 p-4 rounded-lg border-b-4 border-indigo-400 text-center transition hover:shadow-md">
                            <p class="text-xs text-indigo-600 font-bold uppercase tracking-wider mb-1">Sektor 2</p>
                            <div class="flex items-center justify-center space-x-2">
                                <i class="bi bi-house-door text-indigo-500 text-lg"></i>
                                <p class="text-3xl font-black text-gray-800">{{ $sektor_2 }}</p>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-1">Total Jemaat</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2 flex items-center">
                        <i class="bi bi-diagram-3-fill text-blue-500 mr-2"></i> PELKAT
                    </h3>
                    <div class="grid grid-cols-3 gap-3 text-center">
                        @foreach(['PA', 'PT', 'GP', 'PKB', 'PKP', 'PKLU'] as $kat)
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <p class="text-xs text-blue-600 font-bold mb-1">{{ $kat }}</p>
                            <p class="text-xl font-black text-gray-800">{{ $kategori[$kat] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-8">
                <div class="lg:col-span-6"> 
                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                        <div class="bg-white rounded-lg shadow-sm border-t-4 border-yellow-400">
                            <div class="p-6 border-b flex justify-between items-center">
                                <h3 class="text-lg font-bold text-gray-700">
                                    <i class="bi bi-balloon-fill text-yellow-500 mr-2"></i> 
                                    HUT Jemaat Minggu Ini
                                </h3>
                                <span class="text-xs bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold">
                                    {{ $rentang_tgl }}
                                </span>
                            </div>
                            
                            <div class="p-0">
                                @if($ultah_jemaat->count() > 0)
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-left">
                                            <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                                                <tr>
                                                    <th class="px-6 py-3">Nama Jemaat</th>
                                                    <th class="px-6 py-3">Tanggal</th>
                                                    <th class="px-6 py-3">Usia Ke-</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y">
                                                @foreach($ultah_jemaat as $m)
                                                <tr class="hover:bg-yellow-50 transition">
                                                    <td class="px-6 py-4 font-medium text-gray-800">{{ $m->nama_pertama }} {{ $m->nama_belakang }}</td>
                                                    <td class="px-6 py-4 text-sm">
                                                        <span class="badge bg-white border border-yellow-300 text-yellow-700 px-2 py-1 rounded">
                                                            {{ $m->tanggal_lahir->format('d M') }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-600">
                                                        {{ $m->tanggal_lahir->age + 1 }} Tahun
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="p-10 text-center">
                                        <i class="bi bi-calendar-x text-gray-300 text-4xl"></i>
                                        <p class="text-gray-400 mt-2">Tidak ada jemaat yang berulang tahun minggu ini.</p>
                                    </div>
                                @endif
                            </div>
                            <div class="bg-gray-50 p-4 text-center rounded-b-lg">
                                <p class="text-xs text-gray-400 italic">Data otomatis diupdate setiap hari Senin pukul 00:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6">
                    <div class="bg-white rounded-lg shadow-sm border-t-4 border-rose-400">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h3 class="text-lg font-bold text-gray-700">
                                <i class="bi bi-heart-fill text-rose-500 mr-2"></i> 
                                Wedding Anniversary Minggu Ini
                            </h3>
                            <span class="text-xs bg-rose-100 text-rose-700 px-3 py-1 rounded-full font-semibold">
                                {{ $rentang_tgl }}
                            </span>
                        </div>
                        
                        <div class="p-0">
                            @if($ultah_nikah->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left">
                                        <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                                            <tr>
                                                <th class="px-6 py-3">Keluarga</th>
                                                <th class="px-6 py-3 text-center">Tanggal Nikah</th>
                                                <th class="px-6 py-3 text-center">Usia Pernikahan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y">
                                            @foreach($ultah_nikah as $m)
                                            <tr class="hover:bg-rose-50 transition">
                                                <td class="px-6 py-4 font-medium text-gray-800">
                                                    {{ $m->nama_pertama }} {{ $m->nama_belakang }} 
                                                    <span class="text-xs text-gray-400 block">Keluarga: {{ $m->family->nama_keluarga ?? '-' }}</span>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-center">
                                                    <span class="badge bg-white border border-rose-300 text-rose-700 px-2 py-1 rounded font-bold">
                                                        {{ $m->tgl_nikah_gereja->format('d M') }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-600 text-center">
                                                    {{-- Hitung selisih tahun nikah sampai tahun ini --}}
                                                    Ke-{{ now()->year - $m->tgl_nikah_gereja->year }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="p-10 text-center">
                                    <i class="bi bi-heartbreak text-gray-300 text-4xl"></i>
                                    <p class="text-gray-400 mt-2">Tidak ada ulang tahun pernikahan minggu ini.</p>
                                </div>
                            @endif
                        </div>
                        <div class="bg-gray-50 p-4 text-center rounded-b-lg">
                            <p class="text-xs text-gray-400 italic">Bahagialah keluarga yang takut akan Tuhan</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-8">
                {{-- Card Sebaran Wilayah (Makan jatah 6 kolom dari 12) --}}
                <div class="lg:col-span-6">
                    {{-- Tambahkan h-full agar tingginya sejajar dengan card kanan --}}
                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden flex flex-col h-full">
                        
                        {{-- Header Card --}}
                        <div class="p-6 border-b bg-gradient-to-r from-gray-50 to-white flex justify-between items-center">
                            <h3 class="text-lg font-bold text-gray-800 flex items-center">
                                <i class="bi bi-geo-alt-fill text-red-500 mr-2"></i> 
                                Sebaran Wilayah (Kodepos)
                            </h3>
                            <span class="text-xs font-bold bg-blue-100 text-blue-600 px-2 py-1 rounded-lg">
                                {{ $demografi_kodepos->count() }} Area
                            </span>
                        </div>
                        
                        {{-- Body Card (Scrollable) --}}
                        <div class="p-6 max-h-[500px] overflow-y-auto custom-scrollbar flex-grow">
                            <div class="space-y-6">
                                @forelse($demografi_kodepos as $kodepos => $data)
                                    @php
                                        $jumlah = $data['total']; 
                                        $persen = ($total_jemaat_aktif > 0) ? ($jumlah / $total_jemaat_aktif) * 100 : 0;
                                        $isBelumDiisi = ($kodepos == 'BELUM DIISI');
                                    @endphp
                                    
                                    <div class="group">
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="flex items-center">
                                                <span class="w-10 h-10 rounded-xl flex items-center justify-center font-black text-[10px] mr-3 border transition-colors 
                                                    {{ $isBelumDiisi ? 'bg-red-50 text-red-400 border-red-100 shadow-sm' : 'bg-gray-50 text-gray-600 border-gray-200 group-hover:bg-blue-600 group-hover:text-white' }}">
                                                    {{ $isBelumDiisi ? '?' : $kodepos }}
                                                </span>
                                                
                                                <div>
                                                    <span class="text-sm font-bold {{ $isBelumDiisi ? 'text-red-500 italic' : 'text-gray-700' }}">
                                                        @if($isBelumDiisi)
                                                            Alamat Belum Lengkap
                                                        @else
                                                            {{ $data['village'] ?? 'Wilayah Tidak Terdaftar' }}
                                                        @endif
                                                    </span>
                                                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest">
                                                        {{ $isBelumDiisi ? 'Perlu Update Data' : $data['district'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="text-right">
                                                <span class="text-sm font-black {{ $isBelumDiisi ? 'text-red-600' : 'text-blue-600' }} block">{{ $jumlah }} Jiwa</span>
                                                <span class="text-[10px] font-bold text-gray-400">{{ number_format($persen, 1) }}%</span>
                                            </div>
                                        </div>
                                        
                                        <div class="w-full bg-gray-100 rounded-full h-1.5">
                                            <div class="{{ $isBelumDiisi ? 'bg-red-400 shadow-[0_0_8px_rgba(248,113,113,0.5)]' : 'bg-blue-500 shadow-sm' }} h-1.5 rounded-full transition-all duration-1000" 
                                                style="width: {{ $persen }}%"></div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <p class="text-gray-400 text-sm italic">Belum ada data distribusi wilayah</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        
                        {{-- Footer Card --}}
                        <div class="bg-gray-50 p-4 border-t text-center mt-auto">
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                                Total Data Berdasarkan Alamat Keluarga Aktif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6">
                    <div class="lg:col-span-6 space-y-8">
                        {{-- Card Golongan Darah --}}
                        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                                <i class="bi bi-droplet-fill text-red-600 mr-2"></i> Golongan Darah 
                                @if($goldar_kosong > 0)
                                    <div class="text-right">
                                        <span class="text-[10px] font-bold bg-orange-50 text-orange-600 px-2 py-1 rounded-lg border border-orange-100 shadow-sm animate-pulse">
                                            DATA KOSONG: {{ $goldar_kosong }}
                                        </span>
                                    </div>
                                @endif
                            </h3>
                            <div class="grid grid-cols-4 gap-4 text-center">
                                @foreach(['A', 'B', 'AB', 'O'] as $goldar)
                                    @php
                                        // Contoh logic: Ambil dari variable $demografi_goldar yang dikirim controller
                                        $countGoldar = $demografi_goldar[$goldar] ?? 0;
                                        $persenGoldar = ($total_jemaat_aktif > 0) ? ($countGoldar / $total_jemaat_aktif) * 100 : 0;
                                    @endphp
                                    <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 hover:border-red-200 transition-all group">
                                        <span class="text-2xl font-black text-gray-800 group-hover:text-red-600">{{ $goldar }}</span>
                                        <p class="text-xs font-bold text-gray-400 mt-1">{{ $countGoldar }} Jiwa</p>
                                        <div class="mt-2 text-[10px] font-bold text-red-500">{{ number_format($persenGoldar, 0) }}%</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Card Pekerjaan --}}
                        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                            <div class="p-6 border-b bg-gradient-to-r from-gray-50 to-white flex justify-between items-center">
                                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                                    <i class="bi bi-briefcase-fill text-blue-500 mr-2"></i> Profesi Jemaat
                                </h3>
                                <span class="text-[10px] font-bold text-gray-400 uppercase">Hanya Jemaat Bekerja</span>
                            </div>
                            <div class="p-6 max-h-[350px] overflow-y-auto custom-scrollbar">
                                <div class="divide-y divide-gray-50">
                                    @forelse($demografi_pekerjaan as $kerja => $jumlah)
                                        <div class="py-3 flex items-center justify-between group">
                                            <div class="flex flex-col">
                                                <span class="text-sm font-bold text-gray-700 group-hover:text-blue-600 transition-colors">
                                                    {{ strtoupper($kerja) }}
                                                </span>
                                                <span class="text-[10px] text-gray-400 font-medium">Sektor Pekerjaan</span>
                                            </div>
                                            <div class="text-right">
                                                <span class="text-sm font-black text-gray-800">{{ $jumlah }}</span>
                                                <span class="text-[10px] text-gray-400 block">Orang</span>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center py-6">
                                            <p class="text-gray-400 text-sm italic">Tidak ada data profesi</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                /* Bikin scrollbar-nya cantik (opsional) */
                .custom-scrollbar::-webkit-scrollbar {
                    width: 4px;
                }
                .custom-scrollbar::-webkit-scrollbar-track {
                    background: #f1f1f1;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb {
                    background: #cbd5e1;
                    border-radius: 10px;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                    background: #94a3b8;
                }
            </style>

            

            
            
        </div>
    </div>
</x-app-layout>