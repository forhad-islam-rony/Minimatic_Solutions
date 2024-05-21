@extends('layouts.vendor');

@section('content')
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img style="border-style: groove;border-radius: 20px;" width=253 height=183
                        src="{{ $vendor->image ?? '/storage/product/no-image.png' }}" alt="" />
                    <br />
                    <br />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ $vendor->name }}
                    </h5>
                    <h6>
                        <br />
                    </h6>
                    <p class="proile-rating">Products : <b>{{ $productsCount }}</b></p>
                    <p class="proile-rating">Orders : <b>{{ $ordersCount }}</b></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <a href="dashboard/edit" class="btn btn-primary profile-edit-btn" name="btnAddMore">Edit Profile</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $vendor->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $vendor->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $vendor->mobile }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Shop Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $vendor->shop_name ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ordered Delivered</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $ordersCount }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Products</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $productsCount }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $vendor->shop_address ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Rating
                            </div>
                            <div class="col-md-6">
                                {{ $vendor->ratingAvg() }} out of 5
                                (
                                @if ($vendor->rate->count() > 0)
                                    {{ $vendor->rate->count() }}
                                @else
                                    No
                                @endif
                                ratings)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
