@include('partials.marketing.catalog-data')

<div class="catalog-grid">
    @foreach ($catalogProducts as $product)
        @include('partials.marketing.product-card', $product)
    @endforeach
</div>
