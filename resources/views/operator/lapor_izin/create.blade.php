<x-app-layout>
    <x-slot name="header">
        {{ __('Create Lapor Izin') }}
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Pelaporan Izin Non OSS</span></h1>
            <x-splade-form :default="['izin' => $izin]" action="{{ route('lapor-izin.store') }}" method="post">
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-input required name="nama_perusahaan" type="text" placeholder="Tulis Nama Lembaga / Instansi / Perusahaan / Perorangan" label="Nama Lembaga / Instansi / Perusahaan / Perorangan" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-textarea autosize required name="alamat_perusahaan" type="text" placeholder="Alamat" label="Alamat" />
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-input required name="tanggal_masuk" date label="Tanggal Masuk Permohonan" />
                    </div>
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-input required name="tanggal_izin" date label="Tanggal Izin Terbit" />
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-input required name="nomor_izin" type="text" placeholder="Nomor Izin" label="Nomor Izin" />
                    </div>
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-select name="izin_id" label="Jenis Izin" choices :options="$izin" option-label="nama_izin" option-value="id" />
                    </div>
                </div>
                <LaporIzin></LaporIzin>

                <x-splade-group>
                    <x-splade-submit class="mt-3 py-2" label="Tambahkan" />
                </x-splade-group>

            </x-splade-form>
        </div>
    </div>

</x-app-layout>