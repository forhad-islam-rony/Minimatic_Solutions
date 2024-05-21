<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Discount;
use \App\Models\Brand;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth');
    }

    public function index()
    {
        $discounts = Discount::get();
        $columns = ['id','name'];
        $tableName = 'discount';
        return view('admin.pages.discount.index',compact('discounts','columns','tableName'));
    }

    public function store()
    {
        $data = request()->all();
        request()->validate([
            'name'=>'required',
        ]);
        Discount::create($data);
        return redirect('/admin/discount')->with('message','added Successfully');
    }

    
    public function add()
    {
        return view('admin.pages.discount.add');
    }
    
    public function edit(Discount $discount)
    {
        return view('admin.pages.discount.edit',compact('discount'));
    }
    
    public function update(Discount $discount)
    {
        $data = request()->all();
        request()->validate([
            'name'=>'required',
        ]);
        $discount->update($data);
        return redirect('/admin/discount')->with('message','Updated Successfully');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect('/admin/discount')->with('danger-message','Deleted Successfully');
    }
}
