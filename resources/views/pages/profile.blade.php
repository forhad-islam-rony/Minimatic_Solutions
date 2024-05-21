@extends('layouts.app')
@section('content')
    <div class="profile_container">
        <div class="tab">
            <a href="/profile"><button class="tablinks active">Profile</button></a>
            <a href="/wallet"><button class="tablinks">Wallet</button></a>
            <a href="/orderHistory"><button class="tablinks">Order History</button></a>
            <a href="/wishlist"><button class="tablinks">Wishlist</button></a>
            <a href="/logout"><button class="tablinks pull-right">Logout</button></a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <form action="/profile/{{ $user->id }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row" style="margin-top:50px;margin-left: 10px;">
                        <div class="col-md-4">
                            <label style="margin-bottom:0px;vertical-align: baseline;margin-top:15px">Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="{{ $user->name }}" name="name" placeholder="Enter Your Name"
                                class="form-control" />
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <div class="col-md-4">
                            <label style="margin-bottom:0px;vertical-align: baseline;margin-top:15px">E-mail</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="{{ $user->email }}" name="email"
                                placeholder="Enter Your E-mail" class="form-control" />
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <div class="col-md-4">
                            <label style="margin-bottom:0px;vertical-align: baseline;margin-top:15px">Mobile</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="{{ $user->mobile }}" name="mobile"
                                placeholder="Enter Your Mobile" class="form-control" />
                        </div>
                    </div>
                    @if (count($user->address) == 0)
                        <div class="row" style="margin-left: 10px;" id="address">
                            <div class="col-md-4">
                                <label style="margin-bottom:0px;vertical-align: baseline;margin-top:15px">Address 1</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="address[]" rows="5" class="col-md-8" placeholder="Enter Address"></textarea>
                                <button class="btn btn-primary" onclick="addressManage(event,'add')"
                                    style="margin-left: 5px;">+</button>
                            </div>
                        </div>
                    @else
                        <div class="row" style="margin-left: 10px;" id="address">
                            @foreach ($user->address as $address)
                                <div id="address{{ $address->address_number }}">
                                    <div class="col-md-4">
                                        <label style="margin-bottom:0px;vertical-align: baseline;margin-top:15px">Address
                                            {{ $address->address_number }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="address[]" rows="5" class="col-md-8" placeholder="Enter Address">{{ $address->address }}</textarea>
                                        <button class="btn btn-danger" onclick="remove(event)"
                                            style="margin-left: 5px;">-</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="row mt-1" style="margin-left: 15px;">

                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button class="btn btn-primary" onclick="addressManage(event,'add')">Add Address</button>
                        </div>
                    </div>
                    <script>
                        var count = {{ count($user->address) }};

                        function addressManage(event, operation) {
                            event.preventDefault();
                            var main = document.getElementById('address');
                            count++;
                            main.innerHTML += getString(count);
                        }

                        function remove(event) {
                            event.preventDefault();
                            var main = document.getElementById('address' + count);
                            if (count > 1) {
                                count--;
                                main.remove();
                            }
                        }

                        function getString(count) {
                            var content =
                                '<div id="address' + count +
                                '"><div class="col-md-4 mt-1"><label style="margin-bottom:0px;vertical-align: baseline;margin-top:15px">Address ' +
                                count + '</label></div>';
                            content +=
                                '<div class="col-md-8 mt-1"><textarea name="address[]" rows="5" class="col-md-8" placeholder="Enter Address"></textarea>';
                            content +=
                                '<button class="btn btn-danger" onclick="remove(event)" style="margin-left: 5px;">-</button></div></div>';
                            return content;
                        }
                    </script>
                    <div class="row" style="margin-left: 10px;">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8" style="margin-top: 20px">
                            <input type="submit" name="submit" value="Save Changes" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
