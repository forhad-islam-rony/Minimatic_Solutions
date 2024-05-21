@extends('layouts.app')
@section('content')
@include('partial.slider',['categories' => App\Models\Category::all()])
<hr/>
<div class="contact-section margin-top">
    <h1>Contact US</h1><br/> 
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h3>Address</h3>
                    <label>Address Line 1, </label>
                    <label>Address Line 2, </label><br/>
                    <label>Address Line 3, </label>
                    <label>City - 123 456, </label><br/>
                    <label> State ,</label> <label> Country</label><br/>

                    <label><span class="glyphicon glyphicon-phone"></span> 01783226830</label><br/>
                    <label><span class="glyphicon glyphicon-envelope"></span> forhadrony161@gmail.com</label>
                </div><br/>
                <div> 
                    <h3>Follow us on</h3><br/>
                    <a href="#" class="float-shadow">
                        <img src="image/fb.png"/>
                    </a>
                    <a href="#" class="float-shadow">
                        <img src="image/twit.png"/>
                    </a>
                    <a href="#" class="float-shadow">
                        <img src="image/gp.png"/>
                    </a>
                    <a href="#" class="float-shadow">
                        <img src="image/yt.png"/>
                    </a>
                </div>
            </div>
            <div class="col-md-6" align="center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.3474396624188!2d89.49978157508795!3d22.900552379259466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9bda1d0ff6e5%3A0x123a926908efcd0c!2sKhulna%20University%20of%20Engineering%20%26%20Technology!5e0!3m2!1sen!2sbd!4v1715343589342!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection