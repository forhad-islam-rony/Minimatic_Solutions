@extends('layouts.app')
@section('content')
    <div class="login-section">
        <div class="container" style="margin-top:-15rem;">
            <div class="row">
                @if (session('message'))
                    <div class="alert alert-{{ session('color') }} alert-dismissible py-4" style="margin-top: 50px;"
                        role="alert">
                        <button style="right:0;" type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{ session('message') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible py-4" style="margin-top: 50px;" role="alert">
                        <button style="right:0;" type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="col-md-5 login">
                    <h1>Login</h1>
                    <form method="post">
                        @csrf
                        <div style="display: flex;justify-content: space-evenly;margin:20px 0px;">
                            <div>
                                <input type="radio" id="vendor" name="loginType" value="vendor">
                                <label for="vendor">Vendor</label>
                            </div>
                            <div>
                                <input type="radio" id="user" name="loginType" value="user" checked>
                                <label for="user">User</label>
                            </div>
                        </div>
                        <div>
                            <input type="text" value="{{ old('email') }}" name="email" placeholder="Email"
                                class="form-control" />
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Password" class="form-control" />
                        </div>
                        <div>
                            <input type="submit" value="Login" name="ok" class="btn btn-submit" />
                        </div>
                        <div class="forgot-pass">
                            <a href="forgot-pass.php">Forgot Password ?</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 border-seprator" align="center">
                    <img src="image/line.png" />
                </div>
                <div class="col-md-6 register">
                    <h1>Register</h1>
                    <form action="/register" method="post">
                        @csrf
                        <div style="display: flex;justify-content: space-evenly;margin:20px 0px;">
                            <div>
                                <input type="radio" id="vendor" name="loginType" value="vendor">
                                <label for="vendor">Vendor</label>
                            </div>
                            <div>
                                <input type="radio" id="user" name="loginType" value="user" checked>
                                <label for="user">User</label>
                            </div>
                        </div>
                        <div>
                            <input type="text" value="{{ old('name') }}" name="name" placeholder="Enter Name"
                                class="form-control" />
                        </div>
                        <div>
                            <input type="text" value="{{ old('email') }}" name="email" placeholder="Email"
                                class="form-control" />
                        </div>
                        <div>
                            <input type="text" value="{{ old('mobile') }}" name="mobile" placeholder="Contact"
                                class="form-control" />
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Password" class="form-control" />
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                class="form-control" />
                        </div>
                        <div>
                            <input type="submit" value="Register" class="btn btn-submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
