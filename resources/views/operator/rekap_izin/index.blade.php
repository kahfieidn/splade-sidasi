<x-app-layout>
    <x-slot name="header">
        {{ __('Rekap Izin Non OSS') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Rekapitulasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Izin Non OSS</span></h1>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Sektor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Januari
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Februari
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Maret
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    April
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mei
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Juni
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Juli
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Agustus
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    September
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Oktober
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    November
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Desember
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sektors as $key=>$sektor)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $sektor->nama_sektor }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $januaris[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $februaris[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $marets[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $aprils[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $meis[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $junis[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $julis[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $agustuss[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $septembers[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $oktobers[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $novembers[$key] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $desembers[$key] }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>




        </div>
    </div>

</x-app-layout>