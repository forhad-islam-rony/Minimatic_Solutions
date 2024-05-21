@extends('layouts.vendor')

@section('content')
    @component('admin.components.error', [])
    @endcomponent

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Product</h4>
                <form action="/vendor/product" enctype="multipart/form-data" class="form-sample" method="post">
                    @csrf
                    <input type="hidden" value="{{ Session::get('vendorId') }}" name="vendor_id">
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Select Brand</label>
                        <div class="col-sm-3">
                            <select name="brand_id" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-3 col-form-label">Select Category</label>
                        <div class="col-sm-3">
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <label class="col-sm-3 col-form-label">Select Discount</label>
                        <div class="col-sm-9">
                            <select name="discount_id" class="form-control">
                                @foreach ($discounts as $discount)
                                    <option value="{{ $discount->id }}">{{ $discount->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4 addAttributes" id="addAttributes">
                        <label class="col-sm-3 col-form-label">Select Attributes</label>
                        <div class="col-sm-6 d-flex removeAttributes">
                            <select id="attribute_id" name="attribute_id" class="form-control">
                                @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>
                            <button onclick="remove()" class="col-sm-4 ms-3 lol btn btn-primary">Get Attributes</button>
                        </div>
                    </div>

                    <div class="row mt-4 main">
                        <div class="col-sm-9">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" placeholder="Enter Product Name"
                                        value="{{ old('name') }}" class="form-control" />
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
                                <label class="col-sm-3 col-form-label">Product Details</label>
                                <div class="col-sm-9">
                                    <textarea type="text" value="{{ old('details') }}" name="details" class="form-control"
                                        placeholder="Enter Product Details Here...">{{ old('details') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('details')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Price</label>
                                <div class="col-sm-3">
                                    <input type="text" value="{{ old('price') }}" name="price" class="form-control"
                                        placeholder="Enter Price" />
                                </div>
                                @error('price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                <label class="col-sm-3 col-form-label">Product Quantity</label>
                                <div class="col-sm-3">
                                    <input type="text" name="quantity" value="{{ old('quantity') }}"
                                        class="form-control" placeholder="Enter Quantity" />
                                </div>
                            </div>
                            @error('quantity')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Upload Image</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" type="file"
                                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                                        class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            @error('image')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Preview Image</label>
                                <div class="col-sm-8 ml-3">
                                    <img id="blah" alt="your image" width="500" height="500" />
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
        globalThis.available = [];

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


        function remove() {
            var content = '<div class="row mt-4"><label class="ms-2 col-sm-3 col-form-label text-capitalize">';
            var value = document.getElementById('attribute_id').value;
            available.push(value);
            @for ($i = 0; $i < count($attributes); $i++)
                {
                    if ({{ $attributes[$i]->id }} === parseInt(value)) {
                        content +=
                            '{{ $attributes[$i]->name }}</label><div class="m-2 align-items-center col-sm-7 d-flex flex-wrap">';
                        <?php $j = 0; ?>
                        @foreach (explode(',', $attributes[$i]->value) as $value)
                            content +=
                                '<input type="checkbox" class="me-1" name="attributeArr[{{ $attributes[$i]->id }}][]" value="{{ $j++ }}"><label class="me-3" for="{{ $value }}">{{ $value }}</label>';
                        @endforeach
                        content += '</div></div>';
                        $(".main").append(content);
                        content = '';
                    }
                }
            @endfor

            $(".removeAttributes").remove();
            var data =
                '<div class="col-sm-6 d-flex removeAttributes"><select id="attribute_id" name="attribute_id" class="form-control">';
            @foreach ($attributes as $attribute)
                if (available.indexOf('{{ $attribute->id }}') == -1)
                    data += '<option value="{{ $attribute->id }}">{{ $attribute->name }}</option>';
            @endforeach
            data += '</select><button onclick="remove()" class="col-sm-4 ms-3 lol btn btn-primary">Get Attributes</button>';
            data += '</div>';
            $(".addAttributes").append(data);
        }
    </script>
@endsection
