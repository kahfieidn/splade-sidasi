<x-app-layout>
    <x-slot name="header">
        {{ __('Lapor Izin') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Lapor <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Izin Non OSS</span></h1>
            <Link href="{{ route('lapor-izin-import.index') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Import Data
            </span>
            </Link>
            <Link href="{{ route('lapor-izin.create') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Tambah Data
            </span>
            </Link>


            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul style="margin-bottom: 0rem;">
                    @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @elseif(session('failures'))
            <div class="alert alert-danger">
                <ul style="margin-bottom: 0rem;">
                    @foreach(session('failures') as $failure)
                    <li>
                        Row {{ $failure->row() }} - Attribute: {{ $failure->attribute() }} - Errors: {{ implode(', ', $failure->errors()) }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <x-splade-table search-debounce="1000" pagination-scroll="head" :for="$lapor_izins" striped>
            </x-splade-table>
        </div>
    </div>

</x-app-layout>