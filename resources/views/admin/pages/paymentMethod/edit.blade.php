@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent
{{-- {{dd($brands[4]->products)}}         //To Know how many products are avaiable for this brand --}}
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Payment Method</h4>
      <form action="/admin/paymentMethod/{{$paymentMethod->id}}" class="form-sample" method="post">
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Method Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" value="{{$paymentMethod->name}}" class="form-control" placeholder="Enter Method Name"/>
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
                    <label class="col-sm-4 col-form-label">Available</label>
                    <div class="col-sm-8 form-check form-switch">
                        <input name="available" class="form-check-input" type="checkbox" 
                        @if($paymentMethod->available)
                            checked
                        @endif
                        >
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