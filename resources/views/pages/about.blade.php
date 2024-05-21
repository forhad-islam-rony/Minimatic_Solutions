@extends('layouts.app')
@section('content')
@include('partial.slider',['categories' => App\Models\Category::all()])
<hr/>
<div class="about-section margin-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>About Shop</h1>
                <p>Minimatic Solutions Content Coming Soon.... 
                </p>
            </div>
            <div class="col-md-6" align="center">
                <img style="border-radius:50%;" src="image/logo.jpg" width="50%"/>
                <h1 class="logotext">Minimatic Solutions</h1>
            </div>
        </div>
    </div>
</div>
@endsection