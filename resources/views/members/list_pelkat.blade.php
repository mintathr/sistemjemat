<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengurus Pelayanan Kategorial (PELKAT)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @php
                // Mapping Warna Tailwind sesuai request ente
                $warna_pelkat = [
                    'PELKAT-PA'   => 'from-green-500 to-green-600',   // Success
                    'PELKAT-PT'   => 'from-yellow-400 to-yellow-500', // Warning
                    'PELKAT-GP'   => 'from-blue-600 to-indigo-700',   // Biru
                    'PELKAT-PKP'  => 'from-purple-500 to-purple-600', // Ungu
                    'PELKAT-PKB'  => 'from-gray-500 to-gray-600',     // Gray
                    'PELKAT-PKLU' => 'from-orange-500 to-orange-600', // Orange
                ];

                $urutan = ['PELKAT-PA', 'PELKAT-PT', 'PELKAT-GP', 'PELKAT-PKP', 'PELKAT-PKB', 'PELKAT-PKLU'];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($urutan as $p)
                    @php 
                        $group = $pelkatGroups->get($p);
                        // Ambil warna dari array, kalau tidak ada default ke biru
                        $gradient = $warna_pelkat[$p] ?? 'from-blue-500 to-blue-600';
                    @endphp

                    @if($group)
                    <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 flex flex-col">
                        <div class="px-5 py-4 bg-gradient-to-br {{ $gradient }}">
                            <div class="flex justify-between items-center text-white">
                                <h3 class="text-lg font-black tracking-tighter uppercase">PELKAT {{ $p }}</h3>
                                <i class="bi bi-people-fill opacity-50 text-xl"></i>
                            </div>
                        </div>

                        <div class="flex-1 bg-white">
                            <ul class="divide-y divide-gray-50">
                                @foreach($group as $pengurus)
                                <li class="px-5 py-3 hover:bg-gray-50 transition">
                                    <div class="flex justify-between items-center">
                                        <div class="max-w-[80%]">
                                            <p class="text-sm font-bold text-gray-800 truncate">{{ $pengurus->nama_pertama }} {{ $pengurus->nama_terakhir }}</p>
                                            <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wide">{{ $pengurus->pengurus_pelkat }}</p>
                                        </div>
                                        @if($pengurus->hp)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengurus->no_hp) }}" 
                                           target="_blank" class="text-green-500 hover:scale-110 transition-transform">
                                            <i class="bi bi-whatsapp"></i>
                                        </a>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>