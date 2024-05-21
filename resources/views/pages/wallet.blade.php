@extends('layouts.app')
@section('content')
    <div class="profile_container">
        <div class="tab">
            <a href="/profile"><button class="tablinks">Profile</button></a>
            <a href="/wallet"><button class="tablinks active">Wallet</button></a>
            <a href="/orderHistory"><button class="tablinks">Order History</button></a>
            <a href="/wishlist"><button class="tablinks">Wishlist</button></a>
            <a href="/logout"><button class="tablinks pull-right">Logout</button></a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <h3>You Have <span>0</span> Rs left</h3>
            </div>
        </div>
    </div>
@endsection
