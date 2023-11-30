<x-app-layout>
    <x-slot name="header">
        {{ __('Create Izin') }}
    </x-slot>

    <x-splade-form confirm="Konfirmasi" confirm-text="Apakah anda yakin sudah memastikan data sudah sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" action="{{ route('izin.store') }}" method="post">
        <x-splade-input readonly class="hidden" name="id" />
        <div class="p-4 sm:ml-64">
            <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Formulir <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Penambahan Izin</span></h1>

                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-input required name="nama_izin" type="text" placeholder="Izin Rekomendasi Penelitian" label="Nama Izin" />
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <x-splade-input required placeholder="0" name="masa_kerja" type="number" label="Masa Kerja (Hari)" />
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-splade-input required placeholder="0" name="biaya" type="number" label="Biaya (Rp.)" />
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-select required placeholder="Pilih salah satu..." name="jenis_izin_id" choices label="Pilih Jenis Izin" :options="$jenis_izin" option-label="nama_izin" option-value="id" />
                    </div>
                    <div class="relative z-999 w-full mb-6 group">
                        <x-splade-select required placeholder="Pilih salah satu..." name="sektor_id" choices label="Pilih Sektor" :options="$sektor" option-label="nama_sektor" option-value="id" />
                    </div>
                </div>

                <x-splade-group>
                    <x-splade-submit class="mt-3 py-2" label="Tambahkan Sekarang" />
                </x-splade-group>
            </div>
        </div>
    </x-splade-form>
</x-app-layout>