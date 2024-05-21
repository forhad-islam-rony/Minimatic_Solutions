<div class="category margin-top">
    <div class="container slide">
        <h1>Shop By Seller</h1><br />
        <div class="row">
            @foreach ($sellers as $seller)
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <a href="/seller/{{ $seller->id }}">
                        <div class="box">
                            <img src="{{ $seller->image ?? '/storage/product/no-image.png' }}" /><br />
                            <label>{{ $seller->name }}</label><br />
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
