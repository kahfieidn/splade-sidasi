<x-splade-modal max-width="lg">
<h2 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">Detail <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Sektor</span></h2>

    @foreach ($data_sektor_oss as $data_sektor_oss)
    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
        <div class="flex flex-col pb-3">
            <dd class="text-lg font-semibold">{{ $data_sektor_oss->sektor->nama_sektor }} : {{$data_sektor_oss->jumlah_data_sektor}}</dd>
        </div>
    </dl>
    @endforeach
</x-splade-modal>