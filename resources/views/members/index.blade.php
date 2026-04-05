<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Anggota Jemaat') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-700">Daftar Jemaat</h3>
                    <!-- <a href="{{ route('members.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                        + Tambah Jemaat
                    </a> -->
                </div>

                <div class="overflow-x-auto">
                    <table id="memberTable" class="min-w-full table-auto border border-gray-200">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-4 py-3 border-b text-left">No</th>
                                <th class="px-4 py-3 border-b text-left">Nama Lengkap</th>
                                <th class="px-4 py-3 border-b text-left">Keluarga</th>
                                <th class="px-4 py-3 border-b text-left w-20">Tgl Lahir</th>
                                <th class="px-4 py-3 border-b text-center">Umur</th>
                                <th class="px-4 py-3 border-b text-center">HP</th>
                                <th class="px-4 py-3 border-b text-center">Pelkat</th>
                                <th class="px-4 py-3 border-b text-center">Status</th>
                                <th class="px-4 py-3 border-b text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm">
                            @foreach($members as $index => $member)
                            <tr class="hover:bg-gray-50 border-b border-gray-100 transition">
                                <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium">{{ $member->nama_pertama }} {{ $member->nama_belakang }}</td>
                                <td class="px-4 py-3 text-xs text-gray-500 italic">
                                    {{ $member->family->nama_keluarga ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 text-center">{{ $member->tanggal_lahir->format('Y-m-d') }}</td>
                                <td class="px-4 py-3 text-center">{{ $member->tanggal_lahir->age }}</td>
                                <td class="px-4 py-3 text-center">{{ $member->hp }}</td>
                                <td class="px-4 py-3 text-center">{{ $member->kategori }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase {{ $member->status_aktif == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $member->status_aktif }}    
                                </span>
                                </td>
                                <td class="px-4 py-3 text-center text-xs font-medium">
                                    <div class="flex justify-center space-x-1">
                                        <a href="{{ route('members.show', $member->id) }}" class="text-blue-500 hover:underline">Detail</a>
                                        <span class="text-gray-300">|</span>
                                        <a href="{{ route('members.edit', $member->id) }}" class="text-yellow-600 hover:underline">Edit</a>
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
            $('#memberTable').DataTable({
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