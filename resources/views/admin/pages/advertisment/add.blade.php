@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Advertisment</h4>
                <form action="/admin/advertisment" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Advertisments Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="url" placeholder="Enter Advertisments Url"
                                        value="{{ old('url') }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('url')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <div class="row mt-4">
                                    <label class="col-sm-3 col-form-label">Select Position</label>
                                    <div class="col-sm-9">
                                        <select name="position" class="form-control">
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('position')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Advertisments Duration(ms)</label>
                                <div class="col-sm-9">
                                    <input type="text" name="duration"
                                        placeholder="Enter Advertisments Duration in Milliseconds"
                                        value="{{ old('duration') }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('duration')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row form-group">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Upload Image</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" type="file" class="custom-file-input" id="customFile"
                                        name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            @error('image')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group" style="display:none" id="previewImg">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Preview Image</label>
                                <div class="col-sm-8 ml-3">
                                    <img id="blah" alt="your image" width="400" height="400" />
                                </div>
                            </div>
                        </div>
                    </div>
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

    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            $('#previewImg').show();
            document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])
        });
    </script>
@endsection
