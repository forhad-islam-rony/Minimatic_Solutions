<div class="category margin-top">
    <div class="container slide">
        <h1>Best Selling Product</h1><br />
        <div class="row">
            @foreach ($bestSProducts as $product)
                <div class="col-md-3">
                    <a href="/product/{{ $product->id }}">
                        <div class="box">
                            <img src="{{ $product->image ?? '/storage/product/no-image.png' }}" width="800"
                                height="400" loading="lazy" /><br />
                            <label>{{ $product->name }}</label><br />
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
