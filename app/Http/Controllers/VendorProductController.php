<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Discount;
use App\Models\Attribute;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Session;

class VendorProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('vendorAuth');
    }

    public function index()
    {
        $products= Product::whereIn('vendor_id',[Session::get('vendorId')])->get();
        $columns= ['id', 'category_name', 'name', 'price', 'quantity'];
        return view('vendor.pages.product.index',compact('products','columns'));
    }

    public function add()
    {
        $categories = Category::get();
        $brands = Brand::get();
        $discounts = Discount::get();
        $products = Product::get();
        $attributes = Attribute::get();
        return view('vendor.pages.product.add', compact('categories', 'brands', 'discounts', 'attributes', 'products'));
    }

    public function store()
    {
        $data = request()->validate([
            'brand_id' => 'required',
            'vendor_id' =>'',
            'category_id' => 'required',
            'discount_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'attributeArr' => '',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => ['required', 'image'],
        ]);
        $imagePath = request('image')->store('product', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save();
        $imagePath = "/storage/" . $imagePath;
        $data = array_merge(
            $data,
            ['attributes' => json_encode(request('attributeArr'))],
            ['image' => $imagePath]
        );
        Product::create($data);
        return redirect('/vendor/product')->with('alert-type','success')->with('message', 'added Successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $brands = Brand::get();
        $discounts = Discount::get();
        $attributes = Attribute::get();
        $selectedAttributes = get_object_vars(json_decode($product->attributes));
        return view('vendor.pages.product.edit', compact('categories', 'brands', 'discounts', 'product', 'attributes', 'selectedAttributes'));
    }

    public function update(Product $product)
    {
        $data = request()->all();
        request()->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'discount_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'attributeArr' => '',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => '',
        ]);
        if (request('attributeArr') != null) {
            $data = array_merge(
                $data,
                ['attributes' => json_encode(request('attributeArr'))],
            );
        }
        if (request('image') != null) {
            $filePath = public_path() . $product->image;
            File::delete($filePath);
            $imagePath = request('image')->store('product', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resizeCanvas(500, 500, 'center', false,'#ffffff');
            $image->save();
            $imagePath = "/storage/" . $imagePath;
            $data = array_merge(
                $data,
                ['image' => $imagePath]
            );
        }
        $product->update($data);
        return redirect('/vendor/product')->with('alert-type','success')->with('message', 'Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/vendor/product')->with('danger-message', 'Deleted Successfully');
    }
}
