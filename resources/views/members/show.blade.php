<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-blue-600">Dashboard</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 11l-3.293-3.293a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{ route('members.index') }}" class="ml-1 text-sm text-gray-500 hover:text-blue-600">Anggota</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 11l-3.293-3.293a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-700 italic">{{ $member->no_induk }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            @if($member->status_pindah_meninggal == 'MENINGGAL')
                <div class="mb-6 p-4 bg-gray-900 text-white rounded-3xl shadow-lg border-l-8 border-black flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="bi bi-clouds-fill text-3xl mr-4 text-gray-500"></i>
                        <div>
                            <p class="font-black uppercase tracking-widest text-[10px] opacity-60">Status Keanggotaan</p>
                            <p class="text-lg font-bold">Telah Berpulang ke Rumah Bapa (Meninggal Dunia)</p>
                        </div>
                    </div>
                </div>
            @elseif($member->status_pindah_meninggal == 'PINDAH')
                <div class="mb-6 p-4 bg-amber-500 text-white rounded-3xl shadow-lg border-l-8 border-amber-700 flex items-center">
                    <i class="bi bi-geo-fill text-3xl mr-4"></i>
                    <div>
                        <p class="font-black uppercase tracking-widest text-[10px] opacity-70">Status Keanggotaan</p>
                        <p class="text-lg font-bold">Anggota Sudah Pindah / Mutasi Keluar</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                        <div class="h-32 {{ $member->status_pindah_meninggal == 'Meninggal' ? 'bg-gray-700' : 'bg-gradient-to-r from-blue-600 to-indigo-700' }}"></div>
                        
                        <div class="relative -mt-16 flex justify-center">
                            <div class="relative">
                                <img src="{{ $member->foto ? asset('storage/' . $member->foto) : asset('storage/rr.jpeg') }}" 
                                     class="w-32 h-32 rounded-2xl object-cover border-4 border-white shadow-lg bg-white 
                                            {{ $member->status_pindah_meninggal == 'Meninggal' ? 'grayscale' : '' }}">
                                
                                @if($member->status_pindah_meninggal == 'Meninggal')
                                    <div class="absolute -bottom-2 -right-2 bg-black text-white p-2 rounded-full border-2 border-white">
                                        <i class="bi bi-ribbon-fill"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="p-6 text-center">
                            <h2 class="text-2xl font-black text-gray-800">{{ $member->nama_pertama }} {{ $member->nama_belakang }}</h2>
                            <p class="text-blue-600 font-semibold tracking-wide text-sm">{{ $member->no_induk }}</p>
                            
                            <div class="mt-4 flex flex-wrap justify-center gap-2">
                                @if($member->status_pindah_meninggal == 'Meninggal')
                                    <span class="px-3 py-1 bg-black text-white text-[10px] font-bold rounded-lg uppercase tracking-tighter">MENINGGAL</span>
                                @elseif($member->status_pindah_meninggal == 'Pindah')
                                    <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold rounded-lg uppercase tracking-tighter border border-amber-200">PINDAH</span>
                                @else
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-lg uppercase tracking-tighter border border-green-200">AKTIF</span>
                                @endif

                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold rounded-lg uppercase tracking-tighter border border-gray-200">
                                    {{ $member->hubungan_keluarga }}
                                </span>
                            </div>

                            <div class="mt-8 grid grid-cols-2 gap-4 border-t pt-6">
                                <div class="text-center">
                                    <p class="text-xs text-gray-400 uppercase font-bold">Gol. Darah</p>
                                    <p class="text-lg font-black text-red-600">{{ $member->golongan_darah ?? '-' }}</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-400 uppercase font-bold">Gender</p>
                                    <p class="text-lg font-black text-gray-700">{{ $member->jenis_kelamin }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-md p-6 border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4 flex items-center">
                            <i class="bi bi-telephone-fill mr-2 text-blue-500"></i> Hubungi Anggota
                        </h4>
                        <div class="space-y-4">
                            @if($member->hp)
                                <a href="https://wa.me/{{ $member->hp }}" target="_blank" class="flex items-center p-3 rounded-2xl bg-green-50 text-green-700 hover:bg-green-100 transition">
                                    <i class="bi bi-whatsapp mr-3"></i>
                                    <span class="text-sm font-bold">{{ $member->hp }}</span>
                                </a>
                            @endif
                            <div class="flex items-center p-3 rounded-2xl bg-blue-50 text-blue-700">
                                <i class="bi bi-envelope-fill mr-3"></i>
                                <span class="text-sm font-bold truncate">{{ $member->email ?? 'Tidak ada email' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 space-y-6">
                    
                    <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                        <h3 class="text-lg font-black text-gray-800 mb-6 flex items-center">
                            <span class="w-2 h-8 bg-blue-600 rounded-full mr-3"></span>
                            Timeline Spiritual
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="relative p-5 rounded-2xl border-2 {{ $member->status_baptis == 'S' ? 'border-blue-100 bg-blue-50/50' : 'border-gray-100 bg-gray-50' }}">
                                <div class="text-xs font-black text-blue-400 uppercase mb-2">Baptis</div>
                                <p class="text-lg font-black {{ $member->status_baptis == 'S' ? 'text-blue-900' : 'text-gray-300' }}">
                                    {{ $member->status_baptis == 'S' ? 'Verified' : 'Belum' }}
                                </p>
                                <p class="text-xs text-gray-500 mt-1">{{ $member->tanggal_baptis ? $member->tanggal_baptis->format('d/m/Y') : '-' }}</p>
                            </div>
                            <div class="relative p-5 rounded-2xl border-2 {{ $member->status_sidi == 'S' ? 'border-purple-100 bg-purple-50/50' : 'border-gray-100 bg-gray-50' }}">
                                <div class="text-xs font-black text-purple-400 uppercase mb-2">Sidi</div>
                                <p class="text-lg font-black {{ $member->status_sidi == 'S' ? 'text-purple-900' : 'text-gray-300' }}">
                                    {{ $member->status_sidi == 'S' ? 'Verified' : 'Belum' }}
                                </p>
                                <p class="text-xs text-gray-500 mt-1">{{ $member->tanggal_sidi ? $member->tanggal_sidi->format('d/m/Y') : '-' }}</p>
                            </div>
                            <div class="relative p-5 rounded-2xl border-2 {{ $member->status_nikah == 'S' ? 'border-pink-100 bg-pink-50/50' : 'border-gray-100 bg-gray-50' }}">
                                <div class="text-xs font-black text-pink-400 uppercase mb-2">Nikah</div>
                                <p class="text-lg font-black {{ $member->status_nikah == 'S' ? 'text-pink-900' : 'text-gray-300' }}">
                                    {{ $member->status_nikah == 'S' ? 'Verified' : 'Belum' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-black text-gray-800 flex items-center">
                                <span class="w-2 h-8 bg-indigo-600 rounded-full mr-3"></span>
                                Informasi Lengkap
                            </h3>
                            <a href="{{ route('members.edit', $member->id) }}" class="text-xs bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-bold hover:bg-yellow-200 transition">EDIT DATA</a>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                            <div class="group">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Tempat, Tanggal Lahir</p>
                                <p class="text-gray-700 font-semibold group-hover:text-blue-600 transition">{{ $member->tempat_lahir ?? '-' }}, {{ $member->tanggal_lahir ? $member->tanggal_lahir->format('d F Y') : '-' }}</p>
                            </div>
                            <div class="group">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pendidikan</p>
                                <p class="text-gray-700 font-semibold uppercase">{{ $member->pendidikan_terakhir ?? '-' }} <span class="text-blue-500 font-black">{{ $member->gelar ?? '' }}</span></p>
                            </div>
                            <div class="group">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pekerjaan</p>
                                <p class="text-gray-700 font-semibold">{{ $member->pekerjaan ?? '-' }}</p>
                            </div>
                            <div class="group">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Nama Keluarga</p>
                                <p class="text-gray-700 font-semibold text-indigo-600 underline">Fam. {{ $member->family->nama_keluarga ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="mt-10 p-6 bg-gray-50 rounded-3xl border border-dashed border-gray-300">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Tinggal</p>
                            <p class="text-gray-600 italic">
                                {{ $member->family->alamat ?? 'Alamat belum diisi di data keluarga.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>