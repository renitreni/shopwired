@foreach ($products as $product)
    SKU: {{ $product['sku'] }} - STOCK {{ $product['stock'] }} - ALERT {{ $product['stock_alert'] }} <br>
@endforeach
