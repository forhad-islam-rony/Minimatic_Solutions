<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Brand;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('adminAuth');
    }
    
    public function index()
    {
        $brands = Brand::get();
        $columns = ['id','name'];
        $tableName = 'brand';
        return view('admin.pages.brand.index',compact('brands','columns','tableName'));
    }

    public function add()
    {
        return view('admin.pages.brand.add');
    }

    public function store()
    {
        $data = request()->all();
        request()->validate([
            'name'=>'required',
        ]);
        Brand::create($data);
        return redirect('/admin/brand')->with('message','added Successfully');
    }
    
    public function edit(Brand $brand)
    {
        return view('admin.pages.brand.edit',compact('brand'));
    }
    
    public function update(Brand $brand)
    {
        $data = request()->all();
        request()->validate([
            'name'=>'required',
        ]);
        $brand->update($data);
        $brands = Brand::get();
        return redirect('/admin/brand')->with('message','Updated Successfully');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('/admin/brand')->with('danger-message','Deleted Successfully');
    }
    
}
