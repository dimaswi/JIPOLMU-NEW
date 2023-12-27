<div>
    @section('metas')
        <title>{{ $setting->app_name }}</title>
    @endsection
    <div x-data="{ buyService: false }">
        <div id="main">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="mt-5 mb-7 mx-auto max-w-7xl px-4 sm:mt-14 sm:px-6">
                    <div class="text-center">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block text-indigo-600">JipolMU Formulir</span>
                        </h1>
                    </div>
                    @livewire('form.formulir')
                </div>
            </div>
        </div>

    </div>
</div>
