@extends('layouts.admin');

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form action="/admin/brand/{{$brand->id}}" method="post" class="form-inline">
                @csrf
                @method('PATCH')
                    <label class="me-2">Brand Name</label>
                    <input type="text" value="{{$brand->name}}" name="name" class="form-control me-3 border-2" placeholder="Enter Brand Name">
                    <button type="submit" class="btn btn-primary">update</button>
            </form>
            @error('name')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
    </div>
@endsection