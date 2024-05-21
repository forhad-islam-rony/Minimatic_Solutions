@extends('layouts.admin');

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
            <form action="/admin/category/{{$category->id}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                  <div class="row">
                    <div class="col-md-12 mt-4">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                          <input type="text" placeholder="Enter Category Name" value="{{$category->name}}" name="name" class="form-control" />
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
                                <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                    </div>
            </form>
          </div>
        </div>
    </div>
@endsection