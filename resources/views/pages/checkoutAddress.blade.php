@extends('layouts.app')
@section('content')
    <div class="container mb-3">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <h1>Select Delivery Address</h1>
                @if (count($addresses) != 0)
                    <form action="/paymentMethod" method="post">
                        @csrf
                        @for ($i = 0; $i < count($addresses); $i++)
                            <div class="form-check mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-check-input" type="radio" name="address"
                                            id="{{ $addresses[$i]->id }}" value="{{ $addresses[$i]->id }}"
                                            @if ($addresses[$i]->address_number == 1) checked @endif>
                                        <label class="form-check-label" for="{{ $addresses[$i]->id }}">
                                            Address {{ $addresses[$i]->address_number }}
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="{{ $addresses[$i]->id }}">{{ $addresses[$i]->address }}</label>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <div class="col-md-4"></div>
                        <div class="col-md-8 mt-3">
                            <button type="submit" class="btn btn-primary">
                                Add Payment Method
                            </button>
                        </div>
                    </form>
                @else
                    <form action="/add/address" method="post">
                        @csrf
                        <div class="row" style="margin-top: 30px;" id="address">
                            <div class="col-md-4">
                                <label style="margin-bottom:0px;vertical-align: baseline;margin-top:15px">Address 1</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="address" rows="5" class="col-md-8" placeholder="Enter Address"></textarea>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-8 mt-3">
                                <button class="btn btn-primary">Add Payment Method</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
