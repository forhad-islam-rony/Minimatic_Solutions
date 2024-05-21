@extends('layouts.app')
@section('content')
    <div class="profile_container">
        <div class="tab">
            <a href="/profile"><button class="tablinks">Profile</button></a>
            <a href="/wallet"><button class="tablinks">Wallet</button></a>
            <a href="/orderHistory"><button class="tablinks active">Order History</button></a>
            <a href="/wishlist"><button class="tablinks">Wishlist</button></a>
            <a href="/logout"><button class="tablinks pull-right">Logout</button></a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="table-responsive" style="margin-top:50px;">
                    <table id="dtBasicExample">
                        <thead>
                            <tr>
                                <th class="text-capitalize">Order Id</th>
                                @foreach ($columns as $column)
                                    <th class="text-capitalize">{{ $column }}</th>
                                @endforeach
                                <th class="text-capitalize">Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j = count($orders) - 1; $j >= 0; $j--)
                                @if ($j > 0 && $j != count($orders) - 1 && $orders[$j]['orderId'] != $orders[$j + 1]['orderId'])
                                    <?php $color = !$color; ?>
                                @endif
                                <tr style="background: @if ($color) lightgrey @endif;">
                                    <td style="max-width: 300px;" data-toggle="tooltip"
                                        title="{{ $orders[$j]['orderId'] }}" class="py-1 text-truncate">
                                        @if ($j == count($orders) - 1)
                                            {{ $orders[$j]['orderId'] }}
                                        @elseif ($j > 0 && $orders[$j]['orderId'] != $orders[$j + 1]['orderId'])
                                            {{ $orders[$j]['orderId'] }}
                                        @endif
                                    </td>
                                    <td style="max-width: 300px;" data-toggle="tooltip"
                                        title="{{ $orders[$j]['product'] }}" class="py-1 text-truncate">
                                        <a href="/product/{{ $orders[$j]['product_id'] }}">
                                            {{ $orders[$j]['product'] }}
                                        </a>
                                    </td>
                                    @for ($i = 1; $i < count($columns); $i++)
                                        <td style="max-width: 300px;" data-toggle="tooltip"
                                            title="{{ $orders[$j][$columns[$i]] }}" class="py-1 text-truncate">
                                            {{ $orders[$j][$columns[$i]] }}
                                        </td>
                                    @endfor
                                    <td>
                                        <a href="/order/cancel/{{ $orders[$j]['id'] }}" class="btn btn-danger"
                                            @if ($orders[$j]['status'] == 'Cancelled' || $orders[$j]['status'] == 'Rejected' || $orders[$j]['status'] == 'Product Delivered') @disabled(true) @endif>
                                            Cancel Order
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
