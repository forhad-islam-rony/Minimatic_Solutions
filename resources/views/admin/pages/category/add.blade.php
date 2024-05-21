@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent

<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Category</h4>
        <form action="/admin/category" enctype="multipart/form-data"class="form-sample" method="post">
            @csrf
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" placeholder="Enter Category"/>
                </div>
              </div>
            </div>
          </div>
          @error('name')
            <div class="error text-danger">{{ $message }}</div>
            @enderror

            <div class="row form-group">
              <div class="col-md-12 mt-4">
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Upload Image</label>
                      <div class="col-sm-8 ml-3">
                          <input type="file" class="custom-file-input" id="customFile" name="image">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                  </div>
                  @error('image')<div class="error text-danger">{{ $message }}</div>@enderror
              </div>
          </div>
          <script>
              $(".custom-file-input").on("change", function() {
                  var fileName = $(this).val().split("\\").pop();
                  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
              });
          </script>

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