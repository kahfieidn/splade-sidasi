<x-app-layout>
    <x-slot name="header">
        {{ __('Rekap Izin') }}
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto w-full lg:py-5 ">
                    <div class="w-full space-y-8 p-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <h2 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Rekapitulasi Perizinan Sekabupaten Kota</h2>
                        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Sistem data DPMPTSP ini diperuntukkan bagi DPMPTSP Sekabupaten Kota untuk pelaporan OSS dan Non OSS.</p>
                        <x-splade-form method="GET" action="{{route('admin-rekap-izin.getRekap')}}" class="mt-4 space-y-6">
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-999 w-full group">
                                    <x-splade-select placeholder="Pilih operator disini..." v-model="form.operator" label="Pilih Kabupaten/Kota" required name="operator" :options="$operator" option-label="name" option-value="id" choices />
                                </div>
                                <div class="relative z-999 w-full group">
                                    <x-splade-select placeholder="Pilih periode tahun..." v-model="form.tahun" name="tahun" label="Periode Tahun" required choices :options="$tahun" />
                                </div>
                            </div>
                            <x-splade-submit label="Lihat Rekapitulasi" />
                        </x-splade-form>

                    </div>
                </div>
            </section>
        </div>
    </div>

</x-app-layout>