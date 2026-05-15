<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama_pertama" class="block text-sm font-medium text-gray-700">Nama Pertama</label>
                        <input type="text" name="nama_pertama" id="nama_pertama" value="{{ old('nama_pertama', $member->nama_pertama) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" disabled>
                        @error('nama_pertama') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_belakang" class="block text-sm font-medium text-gray-700">Nama Belakang</label>
                        <input type="text" name="nama_belakang" id="nama_belakang" value="{{ old('nama_belakang', $member->nama_belakang) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" disabled>
                        @error('nama_belakang') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'L' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'P' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Perempuan</span>
                            </label>
                        </div>
                        @error('jenis_kelamin') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="hubungan_keluarga" class="block text-sm font-medium text-gray-700">Hubungan Keluarga</label>
                        <select name="hubungan_keluarga" id="hubungan_keluarga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base">
                            <option value="">-- Pilih Hubungan --</option>
                            <option value="KK" {{ old('hubungan_keluarga', $member->hubungan_keluarga) == 'KK' ? 'selected' : '' }}>Kepala Keluarga</option>
                            <option value="IS" {{ old('hubungan_keluarga', $member->hubungan_keluarga) == 'IS' ? 'selected' : '' }}>Istri</option>
                            <option value="AN" {{ old('hubungan_keluarga', $member->hubungan_keluarga) == 'AN' ? 'selected' : '' }}>Anak</option>
                            <option value="OT" {{ old('hubungan_keluarga', $member->hubungan_keluarga) == 'OT' ? 'selected' : '' }}>Orang Tua</option>
                            <option value="CU" {{ old('hubungan_keluarga', $member->hubungan_keluarga) == 'CU' ? 'selected' : '' }}>Cucu</option>
                            <option value="KA" {{ old('hubungan_keluarga', $member->hubungan_keluarga) == 'KA' ? 'selected' : '' }}>Kakak/Adik Kandung</option>
                            <option value="MN" {{ old('hubungan_keluarga', $member->hubungan_keluarga) == 'MN' ? 'selected' : '' }}>Menantu</option>
                            <option value="FA" {{ old('hubungan_keluarga', $member->hubungan_keluarga) == 'FA' ? 'selected' : '' }}>Family Lain</option>
                        </select>
                        @error('hubungan_keluarga') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $member->tempat_lahir) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tempat_lahir') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror                        
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $member->tanggal_lahir ? $member->tanggal_lahir->format('Y-m-d') : '') }}" placeholder="Pilih tanggal..." class="flatpickr-date mt-1 block w-full h-12 px-4 py-3 text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tanggal_lahir') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status Baptis</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status_baptis" value="S" {{ old('status_baptis', $member->status_baptis) == 'S' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Sudah</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="status_baptis" value="B" {{ old('status_baptis', $member->status_baptis) == 'B' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Belum</span>
                            </label>
                        </div>
                        @error('status_baptis') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tempat_baptis" class="block text-sm font-medium text-gray-700">Tempat Baptis</label>
                        <input type="text" name="tempat_baptis" id="tempat_baptis" value="{{ old('tempat_baptis', $member->tempat_baptis) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tempat_baptis') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_baptis" class="block text-sm font-medium text-gray-700">Tanggal Baptis</label>
                        <input type="text" name="tanggal_baptis" id="tanggal_baptis" value="{{ old('tanggal_baptis', $member->tanggal_baptis ? $member->tanggal_baptis->format('Y-m-d') : '') }}" placeholder="Pilih tanggal..." class="flatpickr-date mt-1 block w-full h-12 px-4 py-3 text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tanggal_baptis') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status Sidi</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status_sidi" value="S" {{ old('status_sidi', $member->status_sidi) == 'S' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Sudah</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="status_sidi" value="B" {{ old('status_sidi', $member->status_sidi) == 'B' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Belum</span>
                            </label>
                        </div>
                        @error('status_sidi') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tempat_sidi" class="block text-sm font-medium text-gray-700">Tempat Sidi</label>
                        <input type="text" name="tempat_sidi" id="tempat_sidi" value="{{ old('tempat_sidi', $member->tempat_sidi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tempat_sidi') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_sidi" class="block text-sm font-medium text-gray-700">Tanggal Sidi</label>
                        <input type="text" name="tanggal_sidi" id="tanggal_sidi" value="{{ old('tanggal_sidi', $member->tanggal_sidi ? $member->tanggal_sidi->format('Y-m-d') : '') }}" placeholder="Pilih tanggal..." class="flatpickr-date mt-1 block w-full h-12 px-4 py-3 text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tanggal_sidi') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status Nikah</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status_nikah" value="Belum Kawin" {{ old('status_nikah', $member->status_nikah) == 'Belum Kawin' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Belum Kawin</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="status_nikah" value="Kawin" {{ old('status_nikah', $member->status_nikah) == 'Kawin' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Kawin</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="status_nikah" value="Cerai Hidup" {{ old('status_nikah', $member->status_nikah) == 'Cerai Hidup' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Cerai Hidup</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="status_nikah" value="Cerai Mati" {{ old('status_nikah', $member->status_nikah) == 'Cerai Mati' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <span class="ml-2">Cerai Mati</span>
                            </label>
                        </div>
                        @error('status_nikah') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tgl_nikah_gereja" class="block text-sm font-medium text-gray-700">Tanggal Nikah Gereja</label>
                        <input type="text" name="tgl_nikah_gereja" id="tgl_nikah_gereja" value="{{ old('tgl_nikah_gereja', $member->tgl_nikah_gereja ? $member->tgl_nikah_gereja->format('Y-m-d') : '') }}" placeholder="Pilih tanggal..." class="flatpickr-date mt-1 block w-full h-12 px-4 py-3 text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tgl_nikah_gereja') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tgl_nikah_sipil" class="block text-sm font-medium text-gray-700">Tanggal Nikah Sipil</label>
                        <input type="text" name="tgl_nikah_sipil" id="tgl_nikah_sipil" value="{{ old('tgl_nikah_sipil', $member->tgl_nikah_sipil ? $member->tgl_nikah_sipil->format('Y-m-d') : '') }}" placeholder="Pilih tanggal..." class="flatpickr-date mt-1 block w-full h-12 px-4 py-3 text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tgl_nikah_sipil') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="golongan_darah" class="block text-sm font-medium text-gray-700">Golongan Darah</label>
                        <select name="golongan_darah" id="golongan_darah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base">
                            <option value="">-- Pilih Golongan Darah --</option>
                            <option value="A" {{ old('golongan_darah', $member->golongan_darah) == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('golongan_darah', $member->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ old('golongan_darah', $member->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                            <option value="O" {{ old('golongan_darah', $member->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                        @error('golongan_darah') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pendidikan_terakhir" class="block text-sm font-medium text-gray-700">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $member->pendidikan_terakhir) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('pendidikan_terakhir') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="gelar" class="block text-sm font-medium text-gray-700">Gelar</label>
                        <input type="text" name="gelar" id="gelar" value="{{ old('gelar', $member->gelar) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('gelar') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $member->jurusan) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('jurusan') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $member->pekerjaan) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('pekerjaan') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tempat_kerja" class="block text-sm font-medium text-gray-700">Tempat Kerja</label>
                        <input type="text" name="tempat_kerja" id="tempat_kerja" value="{{ old('tempat_kerja', $member->tempat_kerja) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tempat_kerja') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pengalaman_organisasi" class="block text-sm font-medium text-gray-700">Pengalaman Organisasi</label>
                        <textarea name="pengalaman_organisasi" id="pengalaman_organisasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('pengalaman_organisasi', $member->pengalaman_organisasi) }}</textarea>
                        @error('pengalaman_organisasi') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pengalaman_gerejawi" class="block text-sm font-medium text-gray-700">Pengalaman Gerejawi</label>
                        <textarea name="pengalaman_gerejawi" id="pengalaman_gerejawi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('pengalaman_gerejawi', $member->pengalaman_gerejawi) }}</textarea>
                        @error('pengalaman_gerejawi') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="penguasaan_bahasa_daerah" class="block text-sm font-medium text-gray-700">Penguasaan Bahasa Daerah</label>
                        <input type="text" name="penguasaan_bahasa_daerah" id="penguasaan_bahasa_daerah" value="{{ old('penguasaan_bahasa_daerah', $member->penguasaan_bahasa_daerah) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('penguasaan_bahasa_daerah') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="penguasaan_bahasa_asing" class="block text-sm font-medium text-gray-700">Penguasaan Bahasa Asing</label>
                        <input type="text" name="penguasaan_bahasa_asing" id="penguasaan_bahasa_asing" value="{{ old('penguasaan_bahasa_asing', $member->penguasaan_bahasa_asing) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('penguasaan_bahasa_asing') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="telp" class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input type="text" name="telp" id="telp" value="{{ old('telp', $member->telp) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('telp') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="hp" class="block text-sm font-medium text-gray-700">HP</label>
                        <input type="text" name="hp" id="hp" value="{{ old('hp', $member->hp) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('hp') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="posisi_jabatan" class="block text-sm font-medium text-gray-700">Posisi Jabatan</label>
                        <input type="text" name="posisi_jabatan" id="posisi_jabatan" value="{{ old('posisi_jabatan', $member->posisi_jabatan) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('posisi_jabatan') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pengurus_pelkat" class="block text-sm font-medium text-gray-700">Pengurus Pelkat</label>
                        <select name="pengurus_pelkat" id="pengurus_pelkat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base">
                            <option value="">-- Pilih Pengurus Pelkat --</option>
                            <option value="PELKAT-PA" {{ old('pengurus_pelkat', $member->pengurus_pelkat) == 'PELKAT-PA' ? 'selected' : '' }}>PELKAT-PA</option>
                            <option value="PELKAT-PT" {{ old('pengurus_pelkat', $member->pengurus_pelkat) == 'PELKAT-PT' ? 'selected' : '' }}>PELKAT-PT</option>
                            <option value="PELKAT-GP" {{ old('pengurus_pelkat', $member->pengurus_pelkat) == 'PELKAT-GP' ? 'selected' : '' }}>PELKAT-GP</option>
                            <option value="PELKAT-PKB" {{ old('pengurus_pelkat', $member->pengurus_pelkat) == 'PELKAT-PKB' ? 'selected' : '' }}>PELKAT-PKB</option>
                            <option value="PELKAT-PKP" {{ old('pengurus_pelkat', $member->pengurus_pelkat) == 'PELKAT-PKP' ? 'selected' : '' }}>PELKAT-PKP</option>
                            <option value="PELKAT-PKLU" {{ old('pengurus_pelkat', $member->pengurus_pelkat) == 'PELKAT-PKLU' ? 'selected' : '' }}>PELKAT-PKLU</option>
                        </select>
                        @error('pengurus_pelkat') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="profesi" class="block text-sm font-medium text-gray-700">Profesi</label>
                        <input type="text" name="profesi" id="profesi" value="{{ old('profesi', $member->profesi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('profesi') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="riwayat_lain" class="block text-sm font-medium text-gray-700">Riwayat Lain</label>
                        <textarea name="riwayat_lain" id="riwayat_lain" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('riwayat_lain', $member->riwayat_lain) }}</textarea>
                        @error('riwayat_lain') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                        <input type="file" name="photo" id="photo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="Foto Profil" class="mt-2 w-20 h-20 object-cover rounded">
                        @endif
                        @error('photo') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('members.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition mr-2">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>