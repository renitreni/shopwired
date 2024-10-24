<div>

    <div class="grid grid-cols-1 gap-4 mt-3">
        @foreach ($audits as $product)
            <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
                <dl class="-my-3 divide-y divide-gray-100 text-sm">
                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Message</dt>
                        <dd class="text-gray-700 sm:col-span-2">
                            <textarea rows="10" class="w-full">{{ $product['message'] }}</textarea>
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Source</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $product['source'] }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Method</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $product['method'] }}</dd>
                    </div>
                </dl>
            </div>
        @endforeach
    </div>
</div>
