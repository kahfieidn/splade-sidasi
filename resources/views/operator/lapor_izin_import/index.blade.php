<x-app-layout>
    <x-slot name="header">
        {{ __('Lapor Izin') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Import <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Lapor Izin (Excel)</span></h1>


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
            @endif


            <x-splade-form action="{{ route('lapor-izin-import.import') }}" method="POST">
                <x-splade-file required name="file" filepond preview />
                <x-splade-submit class="mt-4" label="Import Data" />
            </x-splade-form>

            <x-splade-form action="{{ route('lapor-izin-import.import') }}" method="POST">
                <x-splade-submit class="mt-4" secondary label="Download Format (Excel)" />
            </x-splade-form>


        </div>
    </div>

</x-app-layout>