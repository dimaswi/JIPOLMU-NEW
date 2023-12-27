<div>
    @section('metas')
        <title>{{ __('Peserta') }}</title>
    @endsection
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="" wire:model.live.debounce.300ms="search">
                        </div>
                    </div>

                    <div x-data="{ modelOpen: false }">
                        <!-- BUTTON MODAL TAMBAH -->
                        <button @click="modelOpen =!modelOpen"
                            class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>


                            <span>Peserta</span>
                        </button>
                        <!-- END MODAL TAMBAH -->

                        <!-- MODAL  -->
                        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                            role="dialog" aria-modal="true">
                            <div
                                class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                    aria-hidden="true"></div>

                                <div x-cloak x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block w-full max-w-7xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                    <div class="flex items-center justify-between space-x-4">

                                        <h1 class="text-xl font-medium text-gray-800 ">Tambah Peserta</h1>


                                        <button @click="modelOpen = false"
                                            class="text-gray-600 focus:outline-none hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
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

                                        <div class="mb-3">
                                            <div>
                                                <label for=""
                                                    class="block text-sm text-gray-700 capitalize dark:text-gray-200">Tempat
                                                    Pemungutan Suara
                                                    <span class="text-red-500">*</span></label>
                                                <input wire:model="tps" type="text"
                                                    placeholder="Masukan Tempat Pemungutan Suara"
                                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                @error('tps')
                                                    <span class="text-red-300">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="flex justify-end mt-6">
                                            <button type="submit" @click="modelOpen = false"
                                                class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                                Tambah Peserta
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- MODAL  -->
                    </div>
                </div>

                <div x-data="{ showModal: false }">

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Alamat</th>
                                    <th scope="col" class="px-4 py-3">Umur</th>
                                    @if (auth()->user()->role == 'Administrator')
                                        <th scope="col" class="px-4 py-3">
                                            <center>Upline</center>
                                        </th>
                                    @endif
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bukuInduk as $key => $value)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3" style="width: 25%">
                                            {{ $value->nama }}
                                        </td>
                                        <td class="px-4 py-3" style="width: 25%">
                                            {{ $value->domisili }}
                                        </td>
                                        <td class="px-4 py-3" style="width: 10%">
                                            {{ \Carbon\Carbon::parse($value->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun') }}
                                        </td>
                                        @if (auth()->user()->role == 'Administrator')
                                            <td class="px-4 py-3" style="25%">
                                                <center>{{ $value->referal }}</center>
                                            </td>
                                        @endif
                                        <td class="px-4 py-3 flex items-center justify-end" style="width=25%">
                                            @if (auth()->user()->role == 'Administrator')
                                                <center>

                                                    <!-- BUTTON MODAL TAMBAH -->
                                                    <button wire:click="edit({{ $value->no }})"
                                                        @click="showModal =!showModal"
                                                        class="px-3 py-1 bg-yellow-500 text-white rounded">
                                                        Edit
                                                    </button>
                                                    <button wire:click="remove({{ $value->no }})"
                                                        class="px-3 py-1 bg-red-500 text-white rounded">
                                                        Hapus
                                                    </button>
                                                    <!-- END MODAL TAMBAH -->

                                                </center>
                                            @else
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div
                            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                            <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
                            </div>

                            <div x-cloak x-show="showModal"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="inline-block w-full max-w-7xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                <div class="flex items-center justify-between space-x-4">

                                    <h1 class="text-xl font-medium text-gray-800 ">Update
                                        Peserta</h1>


                                    <button @click="showModal = false" wire:click="close"
                                        class="text-gray-600 focus:outline-none hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>


                                <p class="mt-2 text-sm text-gray-500 ">
                                    Anda dapat menambahkan peserta baru dimodal ini.
                                </p>

                                <form class="mt-5" wire:submit.prevent="update">

                                    <input type="hidden" wire:model="idData">

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
                                                    <option value="DIPLOMA 1">D1</option>
                                                    <option value="DIPLOMA 2">D2</option>
                                                    <option value="DIPLOMA 3">D3</option>
                                                    <option value="DIPLOMA 4">D4</option>
                                                    <option value="SARJANA 1">S1</option>
                                                    <option value="SARJANA 2">S2</option>
                                                    <option value="SARJANA 3">S3</option>
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
                                                <input wire:model="upline" type="text"
                                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                @error('upline')
                                                    <span class="text-red-300">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div>
                                                <label for=""
                                                    class="block text-sm text-gray-700 capitalize dark:text-gray-200">Tempat
                                                    Pemungutan Suara
                                                    <span class="text-red-500">*</span></label>
                                                <input wire:model="tps" type="text"
                                                    placeholder="Masukan Tempat Pemungutan Suara"
                                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                @error('tps')
                                                    <span class="text-red-300">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-end mt-6">
                                        <button type="submit" @click="showModal = false"
                                            class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select wire:model.live="perPage"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                        </div>
                        {{ $bukuInduk->links() }}
                    </div>
                </div>
            </div>
    </section>

</div>
