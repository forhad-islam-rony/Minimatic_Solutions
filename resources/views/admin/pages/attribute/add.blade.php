@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-capitalize">Add {{$tableName}}</h4>
      <form action="/admin/attribute" class="form-sample" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Attribute Name</label>
                <div class="col-sm-9">
                  <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="Enter Attribute Name" />
                </div>
              </div>
            </div>
          </div>
          @error('name')<div class="error text-danger">{{ $message }}</div>@enderror
          <div class="row">
            <div class="col-md-12 mt-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Attribute Value</label>
                <div class="col-sm-9 container1">
                    <script>
                        $(document).ready(function() {
                        var max_fields = 10;
                        var wrapper = $(".container1");
                        var add_button = $(".add_form_field");

                        var x = 1;
                        $(add_button).click(function(e) {
                            e.preventDefault();
                            if (x < max_fields) {
                                x++;
                                $(wrapper).append('<div class="row "> <input class="ms-3 mb-2 col-sm-9 form-control" type="text" name="value[]" placeholder="Enter Attribute Value"/><button href="#" class="delete form-control ms-3 col-sm-1 btn btn-danger">-</button></div>');
                            } else {
                                alert('You Reached the limits')
                            }
                        });

                        $(wrapper).on("click", ".delete", function(e) {
                            e.preventDefault();
                            $(this).parent('div').remove();
                            x--;
                        })
                    });
                    </script>
                    <div class="row"> 
                        <input class="ms-3 mb-2 col-sm-9 form-control" value = "{{old('value[0]')}}" type="text" name="value[]" placeholder="Enter Attribute Value"/>
                        <button href="#" class="add_form_field form-control ms-3 col-sm-1 btn btn-primary">+</button>
                    </div>
                </div>
            </div>
          </div>
          @error('value.*')<div class="error text-danger">{{ $message }}</div>@enderror
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