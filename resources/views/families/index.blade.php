<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-700">Daftar Keluarga Jemaat</h3>
                    <!-- <a href="{{ route('families.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                        + Tambah Keluarga
                    </a> -->
                </div>

                <div class="overflow-x-auto">
                    <table id="familyTable" class="display min-w-full table-auto border border-gray-200">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-4 py-3 border-b text-left">No</th>
                                <th class="px-4 py-3 border-b text-left w-40">Nama Keluarga</th>
                                <th class="px-4 py-3 border-b text-left">Sektor</th>
                                <th class="px-4 py-3 border-b text-left">Alamat</th>
                                <th class="px-4 py-3 border-b text-left">Kodepos</th>
                                <th class="px-4 py-3 border-b text-left">Kode Amplop</th>
                                <th class="px-4 py-3 border-b text-center">Status</th>
                                <th class="px-4 py-3 border-b text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm">
                            @foreach($families as $index => $family)
                            <tr class="hover:bg-gray-50 border-b border-gray-100 transition">
                                <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium">{{ $family->nama_keluarga }}</td>
                                <td class="px-4 py-3 text-center">{{ $family->sektor }}</td>
                                <td class="px-4 py-3">{{ $family->alamat }}</td>
                                <td class="px-4 py-3">
                                    @if($family->wilayah)
                                        <span class="font-bold text-blue-600">{{ $family->wilayah->village }}</span>
                                        <small class="text-gray-400 block">{{ $family->wilayah->district }}</small>
                                    @else
                                        <span class="text-red-400 italic text-xs">belum diisi</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $family->kode_amplop }}</td>
                               <!--  <td class="px-4 py-3">{{ $family->rt }}/{{ $family->rw }}</td> -->
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase {{ $family->status_keluarga == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $family->status_keluarga }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('families.show', $family->id) }}" class="text-blue-500 hover:text-blue-700 px-2 py-1 border border-blue-500 rounded text-xs">Detail</a>
                                        <a href="{{ route('families.edit', $family->id) }}" class="text-orange-500 hover:text-orange-700 px-2 py-1 border border-orange-500 rounded text-xs">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#familyTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "paginate": {
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    }
                }
            })
        })
    </script>
    @endpush
</x-app-layout>