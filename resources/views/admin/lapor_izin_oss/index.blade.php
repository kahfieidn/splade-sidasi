<x-app-layout>
    <x-slot name="header">
        {{ __('Lapor Izin') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Lapor <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Izin OSS</span></h1>

            <x-splade-table search-debounce="1000" pagination-scroll="head" :for="$lapor_izin_oss" striped>
                <x-splade-cell actions as="$lapor_izin_oss">
                    <a modal target="__blank" href="{{ url('storage/lapor_izin_oss/' . $lapor_izin_oss->berkas) }}" class="mr-3 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800">
                        <svg class="w-6 h-6  mr-1 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4" />
                        </svg>
                        Unduh Berkas
                    </a>
                </x-splade-cell>
            </x-splade-table>

        </div>
    </div>

</x-app-layout>