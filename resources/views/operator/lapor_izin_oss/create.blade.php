<x-app-layout>
    <x-slot name="header">
        {{ __('Create Lapor Izin OSS') }}
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Pelaporan Izin OSS</span></h1>
            <x-splade-form action="{{route('lapor-izin-oss.store')}}" method="post">
                <div class="relative z-999 w-full mb-6 group">
                    <x-splade-select name="jenis_oss" label="Jenis Data OSS" required choices :options="$jenis_oss" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-file required name="berkas" filepond preview label="Berkas (.xlsx)" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .xlsx" />
                </div>
                <div class="grid md:grid-cols-3 md:gap-6">
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-input type="number" name="jumlah_data" label="Jumlah Data" required />
                    </div>
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-select name="bulan" label="Periode Bulan" required choices :options="$bulan" />
                    </div>
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-select name="tahun" label="Periode Tahun" required choices :options="$tahun" />
                    </div>
                </div>

                <x-splade-group>
                    <x-splade-submit class="mt-3 py-2" label="Tambahkan" />
                </x-splade-group>

            </x-splade-form>
        </div>
    </div>

</x-app-layout>