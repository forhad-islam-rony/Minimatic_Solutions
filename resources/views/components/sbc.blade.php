<div class="category margin-top">
    <div class="container slide">
        <h1>Shop By Category</h1><br />
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <a href="/category/{{ $category->id }}">
                        <div class="box ">
                            <img src="{{ $category->image ?? '/storage/product/no-image.png' }}"
                                class="img-responsive center-block" />
                            <br />
                            <label>{{ $category->name }}</label><br />
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
