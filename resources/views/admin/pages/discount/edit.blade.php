@extends('layouts.admin')

@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible fade show">{{session('message')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form action="/admin/discount/{{$discount->id}}" method="post" class="form-inline">
                @csrf
                @method('PATCH')
                    <label class="me-2">Discount details</label>
                    <input type="text" value="{{$discount->name}}" name="name" class="form-control me-3 border-2" placeholder="Enter Brand Name">
                    <button type="submit" class="btn btn-primary">update</button>
            </form>
            @error('name')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
    </div>
@endsection