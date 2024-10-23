<div>
    <!-- Base -->

    <a class="group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring" href="#"
        wire:click='syncProducts' wire:loading.class="hidden">
        <span class="absolute inset-0 border border-indigo-600 group-active:border-indigo-500"></span>
        <span
            class="block border border-indigo-600 bg-indigo-600 px-12 py-3 transition-transform active:border-indigo-500 active:bg-indigo-500 group-hover:-translate-x-1 group-hover:-translate-y-1">
            Download Products
        </span>
    </a>
    <a class="group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring" href="#" wire:loading>
        <span class="absolute inset-0 border border-orange-600"></span>
        <span
            class="block border border-orange-600 bg-orange-600 px-12 py-3 transition-transform active:border-orange-500 active:bg-orange-500">
            Syncing API...
        </span>
    </a>

    <div class="grid grid-cols-4 gap-4 mt-3">
        @foreach ($products as $product)
            <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
                <dl class="-my-3 divide-y divide-gray-100 text-sm">
                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Product Name</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $product['title'] }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Description</dt>
                        <dd class="text-gray-700 sm:col-span-2">{!! $product['description'] !!}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">SKU</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $product['sku'] }}</dd>
                    </div>
                </dl>
            </div>
        @endforeach
    </div>
</div>
