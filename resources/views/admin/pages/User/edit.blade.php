@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent
{{-- {{dd($brands[4]->products)}}         //To Know how many products are avaiable for this brand --}}
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update User</h4>
      <form action="/admin/user/{{$user->id}}" class="form-sample" method="post">
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-3 me-5">
                  <input type="text" value="{{old('name') ?? $user->name}}" name="name" class="form-control" placeholder="Enter First Name"/>
                  @error('first_name')<div class="error text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-9 me-5">
                  <input type="text" value="{{old('email') ?? $user->email}}" name="email" class="form-control" placeholder="Enter email"/>
                  @error('email')<div class="error text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-9 me-5">
                  <input type="text" value="{{old('mobile') ?? $user->mobile}}" name="mobile" class="form-control" placeholder="Enter mobile number"/>
                  @error('mobile')<div class="error text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
          </div>
            <div class="row">
                <div class="col-md-12 mt-4">
                  <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
            </div>
          </form>
      </div>
    </div>
</div>
@endsection