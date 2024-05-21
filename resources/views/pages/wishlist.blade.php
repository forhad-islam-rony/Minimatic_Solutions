@extends('layouts.app')

@section('content')
    <div class="profile_container">
        <div class="tab">
            <a href="/profile"><button class="tablinks">Profile</button></a>
            <a href="/wallet"><button class="tablinks">Wallet</button></a>
            <a href="/orderHistory"><button class="tablinks">Order History</button></a>
            <a href="/wishlist"><button class="tablinks active">Wishlist</button></a>
            <a href="/logout"><button class="tablinks pull-right">Logout</button></a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <br />
                <br />
                <br />
                @if (count($wishlists) == 0)
                    <h3 class="text-center">Add Item to wishlist</h3>
                @else
                    <div class="table-wishlist">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="45%">Product Name</th>
                                    <th width="15%">Unit Price</th>
                                    <th width="15%">Buying Date</th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlists as $wishlist)
                                    <tr>
                                        <td width="45%">
                                            <div class="display-flex align-center">
                                                <div class="img-product">
                                                    <img src="{{ $wishlist->product->image }}" alt=""
                                                        class="mCS_img_loaded">
                                                </div>
                                                <div class="name-product">
                                                    <a href="/product/{{ $wishlist->product->id }}">
                                                        {{ $wishlist->product->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="15%" class="price">{{ $wishlist->product->price }}</td>
                                        <td width="15%">{{ substr($wishlist->time, 0, 10) }}</td>
                                        <td width="10%" class="text-center">
                                            <a href="/wishlist/remove/{{ $wishlist->product->id }}" class="trash-icon">
                                                <span class="material-icons">
                                                    cancel
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
