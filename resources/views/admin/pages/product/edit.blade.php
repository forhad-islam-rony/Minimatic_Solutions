@extends('layouts.admin')


@section('content')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
                <h4 class="card-title">Add Product</h4>
                <form class="form-sample" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Select Brand</label>
                        <div class="col-sm-3">
                            <select name="brand_id" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @if ($brand->id == $product->brand_id) selected @endif>
                                        {{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-3 col-form-label">Select Category</label>
                        <div class="col-sm-3">
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <label class="col-sm-3 col-form-label">Select Discount</label>
                        <div class="col-sm-9">
                            <select name="discount_id" class="form-control">
                                @foreach ($discounts as $discount)
                                    <option value="{{ $discount->id }}" @if ($discount->id == $product->discount_id) selected @endif>
                                        {{ $discount->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4 addAttributes">
                        <label class="col-sm-3 col-form-label">Select Attributes</label>
                        <div class="col-sm-6 d-flex removeAttributes">
                            <select id="attribute_id" name="attribute_id" class="form-control">
                                @foreach ($attributes as $attribute)
                                    @if (!in_array($attribute->id, array_keys($selectedAttributes)))
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label onclick="remove()" class="col-sm-4 ms-3 btn btn-primary">Get Attributes</label>
                        </div>
                    </div>
                    @foreach (array_keys($selectedAttributes) as $selectedAttribute)
                        <div class="row mt-4">
                            <div class="col-sm-9">
                                <div class="row mt-4">
                                    <label
                                        class="ms-2 col-sm-3 col-form-label text-capitalize">{{ $attributes->find($selectedAttribute)->name }}</label>
                                    <div class="align-items-center col-sm-5 d-flex flex-wrap ms-5">
                                        <?php
                                        $values = explode(',', $attributes->find($selectedAttribute)->value);
                                        $selectedValues = $selectedAttributes[$selectedAttribute];
                                        ?>
                                        @for ($i = 0; $i < count($values); $i++)
                                            <input type="checkbox" class="me-1"
                                                name="attributeArr[{{ $selectedAttribute }}][]" value="{{ $i }}"
                                                @if (in_array($i, $selectedValues)) checked @endif><label
                                                class="me-3">{{ $values[$i] }}</label>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mt-4 main">
                        <div class="col-sm-9">
                            <script>
                                globalThis.available = [];
                                @foreach (array_keys($selectedAttributes) as $selected)
                                    available.push('{{ $selected }}')
                                @endforeach
                                console.log(available);

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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ $product->name }}"
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
                                <label class="col-sm-3 col-form-label">Product Details</label>
                                <div class="col-sm-9">
                                    <textarea type="text" name="details" class="form-control" placeholder="Enter Product Details Here...">{{ $product->details }}</textarea>
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
                                    <input type="text" value="{{ $product->price }}" name="price" class="form-control"
                                        placeholder="Enter Price" />
                                </div>
                                @error('price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                <label class="col-sm-3 col-form-label">Product Quantity</label>
                                <div class="col-sm-3">
                                    <input type="text" name="quantity" value="{{ $product->quantity }}"
                                        class="form-control" placeholder="Enter Quantity" />
                                </div>
                            </div>
                            @error('price')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12 mt-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Upload Image</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label"
                                        for="customFile">{{ substr($product->image, 18) }}</label>
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
