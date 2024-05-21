@extends('layouts.app')
@section('content')
    <div class="margin-top">
        <div class="container slide category">
            <h1>{{ $content->name }}</h1><br />
            <div class="row">
                @if (count($content->product) == 0)
                    <h1>No Products Avaiable Come Back later</h1>
                @else
                    @foreach ($content->product as $product)
                        <div class="col-md-3 col-sm-4 col-xs-6">
                            <a href="/product/{{ $product->id }}">
                                <div class="box">
                                    <img src="{{ $product->image ?? '/storage/product/no-image.png' }}"
                                        width="100%" /><br />
                                    <label>{{ $product->name }}</label><br />
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
