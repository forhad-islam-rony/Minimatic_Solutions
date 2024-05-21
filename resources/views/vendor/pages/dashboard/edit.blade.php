@extends('layouts.vendor')


@section('content')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Profile</h4>
                <form class="form-sample" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ $vendor->name }}"
                                        class="form-control" />
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
                                <label class="col-sm-3 col-form-label">E-mail</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" value="{{ $vendor->email }}"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror

                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" value="{{ $vendor->mobile }}"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('mobile')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror

                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Shop Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="shop_name" placeholder="Enter Shop Name"
                                        value="{{ $vendor->shop_name }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('shop_name')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror

                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Shop Address</label>
                                <div class="col-sm-9">
                                    <textarea type="text" name="shop_address" placeholder="Enter Shop Address" class="form-control">{{ $vendor->shop_address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('shop_address')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row form-group">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Profile Photo</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label"
                                        for="customFile">{{ substr($vendor->image, 18) }}</label>
                                </div>
                            </div>
                            @error('image')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
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
