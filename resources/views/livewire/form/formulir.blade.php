<div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
    <div  x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="inline-block w-full max-w-7xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
        <div class="flex items-center justify-between space-x-4">

            <h1 class="text-xl font-medium text-gray-800 ">Tambah Peserta</h1>

        </div>


        <p class="mt-2 text-sm text-gray-500 ">
            Anda dapat menambahkan peserta baru dimodal ini.
        </p>

        <form class="mt-5" wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Nama
                            Peserta
                            <span class="text-red-500">*</span></label>
                        <input wire:model="nama" type="text"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('nama')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Kartu
                            Tanda Penduduk
                            <span class="text-red-500">*</span></label>
                        <input wire:model="ktp" type="number"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('ktp')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Tempat
                            Lahir
                            <span class="text-red-500">*</span></label>
                        <input wire:model="tempat_ttl" type="text"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('tempat_ttl')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Tanggal
                            Lahir Peserta
                            <span class="text-red-500">*</span></label>
                        <input wire:model="tanggal_lahir" type="date"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('tanggal_lahir')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2" style="display:none;">
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Organisasi
                            <span class="text-red-500">*</span></label>
                        <input wire:model="aktif_organisasi" type="text"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('aktif_organisasi')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">NBM
                            <span class="text-red-500">*</span></label>
                        <input wire:model="nbm" type="text"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('nbm')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-4">
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Jenis
                            Kelamin
                            <span class="text-red-500">*</span></label>
                        <select wire:model="kelamin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih Jenis Kelamin</option>
                            <option value="L">LAKI - LAKI</option>
                            <option value="P">PEREMPUAN</option>
                        </select>
                        @error('kelamin')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Kabupaten
                            <span class="text-red-500">*</span></label>
                        <select wire:model="kabupaten"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih Kabupaten</option>
                            @foreach ($kabupatens as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('kabupaten')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Kecamatan
                            <span class="text-red-500">*</span></label>
                        <select wire:model="kecamatan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih Kecamatan</option>
                            @foreach ($kecamatans as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('kecamatan')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Desa
                            <span class="text-red-500">*</span></label>
                        <select wire:model="desa"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih Desa</option>
                            @foreach ($desas as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('desa')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Domisli
                            <span class="text-red-500">*</span></label>
                        <input wire:model="domisili" type="text"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('domisili')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Nomor
                            Handphone
                            <span class="text-red-500">*</span></label>
                        <input wire:model="no_hp" type="text"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('no_hp')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Pekerjaan
                            <span class="text-red-500">*</span></label>
                        <select wire:model="pekerjaan" id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih Pekerjaan</option>
                            <option value="TANI">TANI</option>
                            <option value="SWASTA">SWASTA</option>
                            <option value="PNS">PNS</option>
                            <option value="lAIN-LAIN">LAIN-LAIN</option>
                        </select>
                        @error('pekerjaan')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Pendidikan
                            <span class="text-red-500">*</span></label>
                        <select wire:model="pendidikan" id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih Pendidikan</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="DIPLOMA 1">DIPLOMA 1</option>
                            <option value="DIPLOMA 2">DIPLOMA 2</option>
                            <option value="DIPLOMA 3">DIPLOMA 3</option>
                            <option value="DIPLOMA 4">DIPLOMA 4</option>
                            <option value="SARJANA 1">SARJANA 1</option>
                            <option value="SARJANA 2">SARJANA 2</option>
                            <option value="SARJANA 3">SARJANA 3</option>
                        </select>
                        @error('pendidikan')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Status
                            <span class="text-red-500">*</span></label>
                        <select wire:model="status" id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih Status</option>
                            <option value="AKTIF">AKTIF</option>
                            <option value="BELUM VALIDASI">BELUM VALIDASI</option>
                        </select>
                        @error('status')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Status
                            Sosial
                            <span class="text-red-500">*</span></label>
                        <select wire:model="status_sosial" id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih Status Sosial</option>
                            <option value="JURAGAN">JURAGAN</option>
                            <option value="SEJAHTERA">SEJAHTERA</option>
                        </select>
                        @error('status_sosial')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div> --}}
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Upline
                            <span class="text-red-500">*</span></label>
                        <input wire:model="upline" type="text" placeholder="Masukan Nama Koordinator/Relawan"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('upline')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for=""
                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Tempat Pemungutan Suara
                            <span class="text-red-500">*</span></label>
                        <input wire:model="tps" type="text" placeholder="Masukan Tempat Pemungutan Suara"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        @error('tps')
                            <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                    Tambah Peserta
                </button>
            </div>
        </form>
    </div>
</div>