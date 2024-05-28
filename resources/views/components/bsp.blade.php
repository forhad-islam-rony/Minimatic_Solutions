<div class="category margin-top">
    <div class="container slide">
        <h1>Best Selling Product</h1><br />
        <div class="row">
            @foreach ($bestSProducts as $index => $product)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/product/{{ $product->id }}">
                        <div class="box">
                            <img src="{{ $product->image ?? '/storage/product/no-image.png' }}" class="img-responsive" width="800" height="400" loading="lazy" /><br />
                            <label>{{ $product->name }}</label><br />
                        </div>
                    </a>
                </div>
                @if (($index + 1) % 4 == 0)
                    <div class="clearfix visible-md visible-lg"></div>
                @endif
            @endforeach
        </div>
    </div>
</div>


