<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;
use App\Models\Order;
use App\Models\Product;
use App\Models\VendorRate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Session;

class VendorController extends Controller
{

    public function index()
    {
        
        $vendors = Vendor::get();
        $columns = ['id', 'name', 'email', 'mobile'];
        $tableName = 'vendor';

        return view('admin.pages.vendor.index', compact('vendors', 'columns', 'tableName'));
    }
    
    public function add()
    {
        $tableName = 'vendor';
        return view('admin.pages.vendor.add', compact('tableName'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'mobile' => 'required|numeric|digits:11',
        ]);

        $data['password'] = Hash::make(request('password'));

        if (request('loginType')) {
            User::create($data);
            if (request()->session()->has('loginId')) {
                return redirect('/admin/user')->with('alert-type', 'success')->with('message', 'Added Successfully');
            }
            return $this->check();
        } else {
            Vendor::create($data);
            return redirect('/admin/vendor')->with('alert-type', 'success')->with('message', 'Added Successfully');
        }
    }

    public function edit()
    {
        $vendor= Vendor::find(Session::get('vendorId'));
        return view('vendor.pages.dashboard.edit',compact('vendor'));
    }
    
    public function editt(Vendor $vendor)
    {
        return view('admin.pages.vendor.edit', compact('vendor'));
    }

    public function rate()
    {
        VendorRate::updateOrCreate(['user_id'=>request('user_id'),'vendor_id'=>request('vendor_id')],['rate'=>request('rate')]);
        return redirect()->back()
                ->with('alert-type','success')
                ->with('message','Seller Rated Successfully');
    }

    public function update()
    {
        $vendor= Vendor::find(Session::get('vendorId'));
        $data = request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:vendor,email,'.$vendor->id,
            'mobile'=>'required|numeric|digits:11',
            'image'=>'',
            'shop_name'=>'required',
            'shop_address'=>'required'
        ]);
        if (request('image') != null) {
            if($vendor->image!=null){
                $filePath = public_path() . $vendor->image;
                File::delete($filePath);
            }
            $imagePath = request('image')->store('vendor', 'public');
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
        Session::put('vendorName',$data['name']);
        $vendor->update($data);
        return redirect('/vendor/dashboard')
                ->with('alert-type','success')
                ->with('message','Details Updated Successfully');
    }

    public function updated(Request $request, Vendor $vendor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendor,email,' . $vendor->id,
            'mobile' => 'required|numeric|digits:11'
        ]);

        $vendor->update($data);

        return redirect('/admin/vendor')->with('alert-type', 'success')->with('message', 'Vendor updated successfully');
    }

    public function view(){
        $vendor= Vendor::find(Session::get('vendorId'));

        $ordersCount= Order::where('vendor_id',$vendor->id)->count();
        $productsCount= $vendor->product->count();
        return view('vendor.pages.index',compact('vendor','ordersCount','productsCount'));
    }

    public function signup(){
        return view('vendor.pages.signup');
    }

    public function signin(){
        return view('vendor.pages.login');
    }

    public function check(){
        $data = request()->validate([
            'email'=>'required',
            'password'=>'required',  
        ]);
        $vendor = Vendor::where('email','=',$data['email'])->first();
        if($vendor)
        {
            if(Hash::check($data['password'], $vendor['password']))
            {
                request()->session()->put('vendorId',$vendor->id);
                request()->session()->put('vendorName',$vendor->name);
                return redirect('/vendor/dashboard')
                        ->with('alert-type','success')
                        ->with('message','Login Successfully');
            }
            else
            {
                return redirect('/vendor')
                        ->with('alert-type','error')
                        ->with('message','Password is Wrong');
            }
        }
        else
        {
            return redirect('/vendor')
                    ->with('alert-type','error')
                    ->with('message','E-mail is not Registered');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')
                ->with('alert-type','error')
                ->with('message','Logout Successfully');
    }
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect('/admin/vendor')->with('alert-type', 'error')->with('message', 'Deleted Successfully');
    }
}
