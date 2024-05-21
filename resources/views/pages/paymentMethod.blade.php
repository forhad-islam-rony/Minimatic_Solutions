@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <h1>Select Payment Method</h1>
                <form action="/complete/order" method="post">
                    @csrf
                    <input type="hidden" name="address_id" value="{{ $address->id }}">
                    @foreach ($paymentMethods as $method)
                        @if ($method->available == 1)
                            <div class="form-check mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-check-input" type="radio" name="payment"
                                            id="{{ $method->id }}" value="{{ $method->id }}"
                                            @if ($method->id == 1) checked @endif>
                                        <label class="form-check-label" for="{{ $method->id }}">
                                            {{ $method->name }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="row">
                        <div class="col-md-4 mt-3"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">Confirm Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
