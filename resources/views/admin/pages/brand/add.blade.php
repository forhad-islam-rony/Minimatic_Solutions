@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent
{{-- {{dd($brands[4]->products)}}         //To Know how many products are avaiable for this brand --}}
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Brand</h4>
      <form action="/admin/brand" class="form-sample" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Brand Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" placeholder="Enter Brand"/>
                </div>
              </div>
            </div>
          </div>
          @error('name')
            <div class="error text-danger">{{ $message }}</div>
            @enderror
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