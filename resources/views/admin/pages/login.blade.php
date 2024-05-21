@extends('layouts.login')
@section('content')
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h4>Hello! let's get started</h4>
            <h6 class="font-weight-light">Sign in to continue.</h6>
            @if (session('danger-message'))
              <div class="alert alert-danger alert-dismissible fade show">{{session('danger-message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              @endif
            <form class="pt-3" method="post">
              @csrf
              <div class="form-group">
                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
              </div>
              @error('email')<div class="text-danger">{{$message}}</div>@enderror
              <div class="form-group">
                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
              </div>
              @error('password')<div class="text-danger">{{$message}}</div>@enderror
              <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                  </label>
                </div>
                <a href="#" class="auth-link text-black">Forgot password?</a>
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
              </div>
              <div class="text-center mt-4 font-weight-light">
                Don't have an account? <a href="/admin/signup" class="text-primary">Create</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
@endsection