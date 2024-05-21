@extends('layouts.vendor')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="/vendor/orders/{{ $order->id }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Order Id</label>
                        <input type="text" value="{{ $order->id }}" name="order_id" class="form-control col-sm-9"
                            placeholder="Enter Brand Name" readonly="readonly">
                    </div>
                    <div class="row mt-3">
                        <label class="col-3 col-form-label">User Id</label>
                        <input type="text" value="{{ $order->user_id }}" name="user_id" class="form-control col-sm-9"
                            placeholder="Enter Brand Name" readonly="readonly">
                    </div>
                    <div class="row mt-3">
                        <label class="col-3 col-form-label">Product Name</label>
                        <input type="text" value="{{ $order->getProduct()->name }}" name="product"
                            class="form-control col-sm-9" placeholder="Enter Brand Name" readonly="readonly">
                    </div>
                    <div class="row mt-3">
                        <label class="col-3 col-form-label">Quantity</label>
                        <input type="text" value="{{ $order->quantity }}" name="quantity" class="form-control col-sm-9"
                            placeholder="Enter Brand Name" readonly="readonly">
                    </div>
                    <div class="row mt-3">
                        <label class="col-3 col-form-label">Price</label>
                        <input type="text" value="{{ $order->total }}" name="total" class="form-control col-sm-9"
                            placeholder="Enter Brand Name" readonly="readonly">
                    </div>
                    <div class="row mt-3">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9" style="margin-left: -17px;">
                            @if ($order->status != 'cancelled')
                                <select name="status" class="form-control">
                                    @foreach (array_keys($status) as $st)
                                        <option value="{{ $st }}"
                                            @if ($st == $order->status) selected @endif>
                                            {{ $status[$st] }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <select name="status" class="form-control" disabled>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </form>
                @error('name')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
@endsection
