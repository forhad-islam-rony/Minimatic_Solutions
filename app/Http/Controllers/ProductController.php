<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Brand;
use \App\Models\Discount;
use \App\Models\Product;
use \App\Models\User;
use \App\Models\Attribute;
use \App\Models\ProductRate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Session;

class ProductController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        $brands = Brand::get();
        $discounts = Discount::get();
        $products = Product::get();
        $attributes = Attribute::get();
        $columns = ['id', 'category_name', 'name', 'price', 'quantity'];
        return view('admin.pages.product.index', compact('categories', 'brands', 'discounts', 'attributes', 'products', 'columns'));
    }

    public function rate()
    {
        if(request('user_id')==null){
            return redirect()
                    ->back()
                    ->with('alert-type','error')
                    ->with('message','Login First');
        } else{
            if(User::find(Session::get('userId'))->orders->contains('product_id',request('product_id'))){
                ProductRate::updateOrCreate(['user_id'=>request('user_id'),'product_id'=>request('product_id')],['rate'=>request('rate')]);
                return redirect()->back()
                        ->with('alert-type','success')
                        ->with('message','Product Rated Successfully');
            } else{
                return redirect()->back()
                        ->with('alert-type','error')
                        ->with('message','Buy Product First');
            }
        }
    }


    public function add()
    {
        $categories = Category::get();
        $brands = Brand::get();
        $discounts = Discount::get();
        $products = Product::get();
        $attributes = Attribute::get();
        return view('admin.pages.product.add', compact('categories', 'brands', 'discounts', 'attributes', 'products'));
    }

    public function store()
    {
        $data = request()->validate([
            'brand_id' => 'required',
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
        return redirect('/admin/product')->with('message', 'added Successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $brands = Brand::get();
        $discounts = Discount::get();
        $attributes = Attribute::get();
        $selectedAttributes = get_object_vars(json_decode($product->attributes));
        return view('admin.pages.product.edit', compact('categories', 'brands', 'discounts', 'product', 'attributes', 'selectedAttributes'));
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
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save();
            $imagePath = "/storage/" . $imagePath;
            $data = array_merge(
                $data,
                ['image' => $imagePath]
            );
        }
        $product->update($data);
        return redirect('/admin/product')->with('message', 'Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/product')->with('danger-message', 'Deleted Successfully');
    }
}
