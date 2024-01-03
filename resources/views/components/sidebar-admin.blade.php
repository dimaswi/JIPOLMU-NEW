<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
            {{ App\Models\Setting::first()->app_name ?? '' }}
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (request()->routeIs('home'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold @if (request()->routeIs('home')) text-gray-800 dark:text-gray-100 @endif
                    dark:hover:text-gray-200 transition-colors duration-150 hover:text-gray-800 "
                    href="{{ route('home') }}">
                    <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">{{ __('messages.home') }}</span>
                </a>
            </li>
        </ul>
        <ul>
            @if (auth()->user()->role == 'Koordinator' || auth()->user()->role == 'Administrator')
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin_downline') || request()->routeIs('admin_downline') || request()->routeIs('admin_downline_relawan') ||  request()->routeIs('admin_downline_koordinator'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true">
                        </span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm @if (request()->routeIs('admin_downline') || request()->routeIs('admin_downline')  || request()->routeIs('admin_downline_relawan') ||  request()->routeIs('admin_downline_koordinator')) text-gray-800 dark:text-gray-100 @endif font-semibold transition-colors
                    duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin_downline') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" data-slot="icon" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525" />
                        </svg>

                        <span class="ml-4">{{ __('Downline') }}</span>
                    </a>
                </li>
            @endif
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin_peserta') || request()->routeIs('admin_peserta'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true">
                    </span>
                @endif
                <a class="inline-flex items-center w-full text-sm @if (request()->routeIs('admin_peserta') || request()->routeIs('admin_peserta')) text-gray-800 dark:text-gray-100 @endif font-semibold transition-colors
                    duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin_peserta') }}">
                    <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">{{ __('Peserta') }}</span>
                </a>
            </li>
            @if (auth()->user()->role == 'Relawan' || auth()->user()->role == 'Pemilih')
            @elseif(auth()->user()->role == 'Koordinator' || auth()->user()->role == 'Administrator')
                <li x-data="{ menuAdmin: false }" class="relative px-6 py-3  text-gray-800 dark:text-gray-100">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        @click="menuAdmin=!menuAdmin" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                </path>
                            </svg>
                            <span class="ml-4">{{ __('messages.administration') }}</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="menuAdmin">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu">
                            <li
                                class="px-2 py-1 transition-colors duration-150 @if (request()->routeIs('agency_clients')) text-gray-800 dark:text-gray-100 @endif
                            hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="{{ route('admin_users') }}">{{ __('User') }}</a>
                            </li>

                        </ul>
                    </template>
                </li>
            @endif
        </ul>
    </div>

</aside>
