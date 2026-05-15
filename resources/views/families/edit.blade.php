<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('families.update', $family->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="kode_keluarga" class="block text-sm font-medium text-gray-700">Kode Keluarga</label>
                        <input type="text" name="kode_keluarga" id="kode_keluarga" value="{{ old('kode_keluarga', $family->kode_keluarga) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" disabled>
                        @error('kode_keluarga') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_keluarga" class="block text-sm font-medium text-gray-700">Nama Keluarga</label>
                        <input type="text" name="nama_keluarga" id="nama_keluarga" value="{{ old('nama_keluarga', $family->nama_keluarga) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" disabled>
                        @error('nama_keluarga') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Sektor</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="sektor" value="1" {{ old('sektor', $family->sektor) == '1' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">1</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="sektor" value="2" {{ old('sektor', $family->sektor) == '2' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">2</span>
                            </label>
                        </div>
                        @error('sektor') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('alamat', $family->alamat) }}</textarea>
                        @error('alamat') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                        <input type="text" name="rt" id="rt" value="{{ old('rt', $family->rt) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('rt') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                        <input type="text" name="rw" id="rw" value="{{ old('rw', $family->rw) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('rw') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kodepos" class="block text-sm font-medium text-gray-700">Kodepos</label>
                        <input type="text" name="kodepos" id="kodepos" value="{{ old('kodepos', $family->kodepos) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('kodepos') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="telp_rumah" class="block text-sm font-medium text-gray-700">Telp Rumah</label>
                        <input type="text" name="telp_rumah" id="telp_rumah" value="{{ old('telp_rumah', $family->telp_rumah) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('telp_rumah') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status Keluarga</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status_keluarga" value="Aktif" {{ old('status_keluarga', $family->status_keluarga) == 'Aktif' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Aktif</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="status_keluarga" value="Tidak Aktif" {{ old('status_keluarga', $family->status_keluarga) == 'Tidak Aktif' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Tidak Aktif</span>
                            </label>
                        </div>
                        @error('status_keluarga') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kode_amplop" class="block text-sm font-medium text-gray-700">Kode Amplop</label>
                        <input type="text" name="kode_amplop" id="kode_amplop" value="{{ old('kode_amplop', $family->kode_amplop) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('kode_amplop') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="catatan_khusus" class="block text-sm font-medium text-gray-700">Catatan Khusus</label>
                        <textarea name="catatan_khusus" id="catatan_khusus" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('catatan_khusus', $family->catatan_khusus) }}</textarea>
                        @error('catatan_khusus') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('families.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition mr-2">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>