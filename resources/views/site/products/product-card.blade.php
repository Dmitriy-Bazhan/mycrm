<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">

    <div class="product-card-inner">

        @if(!is_null($product->images))

            @php($src = explode(';', $product->images))

            <img class="product-card-block-image" src="{{ asset($crc[0]) }}" alt="">

        @else

            <img class="product-card-block-image" src="{{ asset('image/no-img.png') }}" alt="">

        @endif

        <p>{{ $product->data->name }}</p>

    </div>

</div>
