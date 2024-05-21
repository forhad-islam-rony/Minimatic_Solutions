<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Brand;
use \App\Models\Product;
use \App\Models\User;
use \App\Models\ProductRate;
use \App\Models\VendorRate;
use \App\Models\Wishlist;
use \App\Models\Vendor;
use \App\Models\ProductComment;
use Session;
use Cookie;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    public function index()
    {
        $categories= Category::get();
        $sellers= Vendor::get();
        $bestSProducts= Product::orderBy('sold_quantity','desc')->limit(8)->get();
        if(!Session::has('adDeploy')){
            Cookie::queue('ad','/storage/product/no-image.png',1);
            Session::put('adDeploy','/storage/product/no-image.png');
        }
        return view('pages.index',compact('categories','sellers','bestSProducts'));
    }
    public function getBrands()
    {
        return Brand::get();
    }

    public static function getCategories()
    {
        return Category::get();
    }

    public function products(Category $content)
    {
        return view('pages.products',compact('content'));
    }


    public function seller(Vendor $content)
    {
        return view('pages.products',compact('content'));
    }

    public function product(Product $product)
    {
        $productRate= ProductRate::where('user_id',Session::get('userId'))
                        ->where('product_id',$product->id)
                        ->first();
        $userProductRate= $productRate!=null ? $productRate->rate : 0;
        $vendorRate= VendorRate::where('user_id',Session::get('userId'))
                        ->where('vendor_id',$product->vendor->id)
                        ->first();
        $userVendorRate= $vendorRate!=null ? $vendorRate->rate : 0;
        $vendorR= VendorRate::where('vendor_id',$product->vendor->id)->get();
        $productR= ProductRate::where('product_id',$product->id)->get();
        $productRAvg= $productR->count()!=0 ? array_sum(Arr::pluck($productR,'rate'))/$productR->count() : 0;
        $vendorRAvg= $vendorR->count()!=0 ? array_sum(Arr::pluck($vendorR,'rate'))/$vendorR->count() : 0;

        $vendorRate= ['vendorRateAvg' => $vendorRAvg,
                    'vendorRateCount'=>$vendorR->count(),
                    'userVendorRate'=>$userVendorRate];
        $productRate= ['productRateAvg'=>$productRAvg,
                    'productRateCount'=>$productR->count(),
                    'userProductRate'=>$userProductRate];
        $inWishlist= User::find(Session::get('userId'))!=null ? User::find(Session::get('userId'))->wishlist->contains('product_id',$product->id) : false;
        $userComment= ProductComment::where('user_id',Session::get('userId'))->where('product_id',$product->id)->first();
        return view('pages.product',compact('product','inWishlist','productRate','vendorRate','userComment'));
    }

    public function wishlist(){
        $wishlists= Wishlist::where('user_id',Session::get('userId'))->orderBy('time')->get();
        return view('pages.wishlist',compact('wishlists'));
    }
}
