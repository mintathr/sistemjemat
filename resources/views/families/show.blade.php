<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $family->nama_keluarga }}</h3>
                        <p class="text-sm text-gray-500 mt-1">Kode KK: <span class="font-mono font-bold">{{ $family->kode_keluarga }}</span></p>
                        <p class="text-sm text-gray-500">Alamat: {{ $family->alamat ?? '-' }}</p>
                    </div>
                    <div class="text-right">
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-md text-sm border">
                            Total: <strong>{{ $family->members->count() }}</strong> Anggota
                        </span>
                    </div>
                </div>

                <hr class="mb-6">

                <div class="overflow-x-auto">
                    <table class="min-w-full table-fixed border-collapse">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
                            <tr>
                                <th class="w-8 px-4 py-3 border-b text-center">No</th>
                                <th class="w-64 px-4 py-3 border-b text-left">Nama Lengkap</th>
                                <th class="w-32 px-4 py-3 border-b text-left">Hubungan</th>
                                <th class="w-32 px-4 py-3 border-b text-left">HP</th>
                                <th class="w-24 px-4 py-3 border-b text-center">Kat.</th>
                                <th class="w-40 px-4 py-3 border-b text-left">Tgl Lahir</th>
                                <th class="w-20 px-4 py-3 border-b text-center">Usia</th>
                                <th class="w-20 px-4 py-3 border-b text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm">
                            @forelse($family->members as $member)
                            <tr class="hover:bg-gray-50 border-b transition">
                                <td class="px-4 py-3 text-center text-gray-400">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 font-semibold text-blue-600">
                                    <a href="{{ route('members.show', $member->id) }}" class="hover:underline">
                                        {{ $member->nama_pertama }} {{ $member->nama_belakang }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 italic text-gray-500">{{ $member->hubungan_keluarga }}</td>
                                <td class="px-4 py-3 italic text-gray-500">{{ $member->hp }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded text-[10px] font-bold uppercase">
                                        {{ $member->kategori }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{ $member->tanggal_lahir->format('d M Y') }}</td>
                                <td class="px-4 py-3 text-center">{{ $member->tanggal_lahir->age }} th</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase 
                                        {{-- Logic Warna --}}
                                        @if(is_null($member->status_pindah_meninggal))
                                            bg-gray-100 text-gray-500
                                        @elseif(strtoupper($member->status_pindah_meninggal) == 'PINDAH')
                                            bg-amber-100 text-amber-700
                                        @elseif(strtoupper($member->status_pindah_meninggal) == 'MENINGGAL')
                                            bg-black text-white
                                        @else
                                            bg-green-100 text-green-700
                                        @endif
                                    ">
                                        {{-- Tampilkan teks atau default '-' jika null --}}
                                        {{ $member->status_pindah_meninggal ?? 'Aktif' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-10 text-center text-gray-400 italic">
                                    Belum ada data anggota keluarga.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    <a href="{{ route('families.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                        &larr; Kembali ke Daftar Keluarga
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>