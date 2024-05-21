@extends('layouts.admin');

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <form action="/admin/attribute/{{$attribute->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
            <div class="col-md-12 mt-4">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Attribute Name</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Enter attribute Name" value="{{$attribute->name}}" name="name" class="form-control" />
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
    
                            var x = {{count($value)}};
                            $(add_button).click(function(e) {
                                e.preventDefault();
                                if (x < max_fields) {
                                    x++;
                                    $(wrapper).append('<div class="row "> <input class="ms-3 mb-2 col-sm-9 form-control" type="text" name="value[]"/><button href="#" class="delete form-control ms-3 col-sm-1 btn btn-danger">-</button></div>');
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
                            <input class="ms-3 mb-2 col-sm-9 form-control" value = "{{$value[0]}}" type="text" name="value[]"/>
                            <button href="#" class="add_form_field form-control ms-3 col-sm-1 btn btn-primary">+</button>
                        </div>
                        @for($i=1;$i<count($value);$i++)
                        <div class="row"> 
                            <input class="ms-3 mb-2 col-sm-9 form-control" value = "{{$value[$i]}}" type="text" name="value[]"/>
                            <button href="#" class="delete form-control ms-3 col-sm-1 btn btn-danger">-</button>
                        </div>
                        @endfor
                    </div>
                </div>
              </div>
              @error('value.*')<div class="error text-danger">{{ $message }}</div>@enderror
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