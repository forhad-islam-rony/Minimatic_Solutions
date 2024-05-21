@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent
{{-- {{dd($brands[4]->products)}}         //To Know how many products are avaiable for this brand --}}
@if($errors->any())
  {!!implode('',$errors->all('<div>:message</div>'))!!}
@endif
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add {{$tableName}}</h4>
      <form action="/admin/user" class="form-sample" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-8 me-5">
                  <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="Enter First Name"/>
                  @error('name')<div class="error text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">E-mail</label>
                <div class="col-sm-8 me-5">
                  <input type="text" value="{{old('email')}}" name="email" class="form-control" placeholder="Enter email"/>
                  @error('email')<div class="error text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Mobile</label>
                <div class="col-sm-8 me-5">
                  <input type="text" value="{{old('mobile')}}" name="mobile" class="form-control" placeholder="Enter mobile number"/>
                  @error('mobile')<div class="error text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-8 me-5">
                  <input type="password" value="{{old('first_name')}}" name="password" class="form-control" placeholder="Enter password"/>
                  @error('password')<div class="error text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-8 me-0">
                  <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control" placeholder="Enter password"/>
                  @error('password')<div class="error text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
          </div>
            <div class="row">
                <div class="col-md-12 mt-4">
                  <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </div>
            </div>
          </form>
      </div>
    </div>
</div>
@endsection