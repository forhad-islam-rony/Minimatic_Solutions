@extends('layouts.app')
@section('content')
    {{-- https://bootsnipp.com/snippets/56bAW
        https://bootsnipp.com/snippets/KB03 --}}
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="{{ $product->image }}" />
                                <x-wishlistBtn :product="$product" :inWishlist="$inWishlist"></x-wishlistBtn>
                            </div>
                        </div>
                    </div>
                    <div class="details col-md-6" style="margin-left: 15px;">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <div class="rating">
                            <div class="stars">
                                @for ($i = 1; $i < $productRate['productRateAvg']; $i++)
                                    <span class="material-icons">star</span>
                                @endfor
                                @for ($i = $productRate['productRateAvg']; $i < 5; $i++)
                                    <span class="material-icons">star_border</span>
                                @endfor
                            </div>
                            @if ($productRate['productRateCount'] > 0)
                                <span class="review-no">{{ $productRate['productRateCount'] }} reviews</span>
                            @else
                                <span class="review-no">No reviews</span>
                            @endif
                        </div>
                        <p class="product-description">{{ $product->details }}</p>
                        <h4 class="price">
                            <span>Tk.{{ $product->price }}</span>
                        </h4>
                        <form action="/cart" method="post">
                            @csrf
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <div class="btn-group mb-3">
                                <button type="button" class="btn btn-default border-none" onClick="addItems(event,'add')">
                                    <span class="material-icons">
                                        add_circle
                                    </span>
                                </button>

                                <button type="button" class="btn btn-default border-none" id="quantityBtn"
                                    disabled>1</button>
                                <button type="button" class="btn btn-default border-none" onClick="addItems(event,'sub')">
                                    <span class="material-icons">
                                        remove_circle
                                    </span>
                                </button>
                            </div><br />
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="action">
                                <input type="submit" class="add-to-cart btn btn-default" name="buttonText"
                                    value="add to cart">
                                <input type="submit" class="add-to-cart btn btn-default" name="buttonText" value="buy now">
                            </div>
                        </form>
                        <br />
                        <h4>Seller: <b>{{ $product->vendor->name }} </b><button class="badge badge-primary"
                                data-toggle="modal" data-target="#sellerRate"
                                style="outline: none;border:none;">{{ $vendorRate['vendorRateAvg'] }}
                                <img src="/image/star.svg">
                            </button>
                        </h4>

                        <div class="modal fade" id="sellerRate" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="/vendor/rate" method="post">
                                    @csrf
                                    <input type="hidden" name="vendor_id" value="{{ $product->vendor->id }}">
                                    <input type="hidden" name="user_id" value="{{ Session::get('userId') }}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="modalLabel">Rate Seller</h4>
                                        </div>
                                        <div class="modal-body">
                                            {{ $product->vendor->name }}<br /><br />
                                            <x-rate :rate="$vendorRate['userVendorRate']" ratingFor="vendor__rating"></x-rate>

                                            <script type="application/javascript">
                                                function addItems(event, operation) {
                                                    event.preventDefault();
                                                    var count = document.querySelector('#quantityBtn').innerHTML;
                                                    console.log(operation);
                                                    if (operation == "add") {
                                                        if (count < {{ $product->quantity }})
                                                            count++;
                                                    } else {
                                                        console.log('yes');
                                                        if (count > 1)
                                                            count--;
                                                    }
                                                    document.querySelector('#quantityBtn').innerHTML = count;
                                                    document.querySelector('#quantity').value = count;
                                                }

                                                function star(num, classN) {
                                                    var data = document.querySelector('.' + classN);
                                                    var d = (num - 1) * 4 + 2;
                                                    for (var i = 2; i <= d; i += 4) {
                                                        data.childNodes[i].lastChild.innerHTML = 'star';
                                                    }
                                                    for (var i = d + 4; i <= 18; i += 4) {
                                                        data.childNodes[i].lastChild.innerHTML = 'star_border';
                                                    }
                                                }
                                            </script>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Rate</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="row">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#flipFlop">Rate Product</button>
                        </div>

                        {{-- Modal --}}
                        <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="/product/rate" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="user_id" value="{{ Session::get('userId') }}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="modalLabel">Rate Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            {{ $product->name }}<br /><br />
                                            <x-rate :rate="$productRate['userProductRate']" ratingFor="product__rating"></x-rate>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Rate</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-commentSection :product="$product" :userComment="$userComment"></x-commentSection>
@endsection
