<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Attribute;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth');
    }
    
    public function index()
    {
        $attributes = Attribute::get();
        $columns = ['id','name','value'];
        $tableName = 'attribute';
        return view('admin.pages.attribute.index',compact('attributes','columns','tableName'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'value'=>'required|array',
            'value.*'=>'required',
        ]);
        $value = implode(",", $data['value']);
        $data = array_merge(
            $data,
            ['value'=>$value],
        );
        Attribute::create($data);
        return redirect('/admin/attribute')
                ->with('alert-type','success')
                ->with('message','added Successfully');
    }
    
    
    public function add()
    {
        $attributes = Attribute::get();
        $columns = ['id','name','value','Edit','Delete'];
        $tableName = 'attribute';
        return view('admin.pages.attribute.add',compact('attributes','columns','tableName'));
    }

    public function edit(Attribute $attribute)
    {
        $value = explode(',', $attribute->value);
        return view('admin.pages.attribute.edit',compact('attribute','value'));
    }
    
    public function update(Attribute $attribute)
    {
        $data = request()->all();
        request()->validate([
            'name'=>'required',
            'value'=>'required',
            'value.*'=>'required',
        ]);
        $value = implode(",", $data['value']);
        $data = array_merge(
            $data,
            ['value'=>$value],
        );
        $attribute->update($data);
        $attribute = Attribute::get();
        return redirect('/admin/attribute')
                    ->with('alert-type','success')        
                    ->with('message','Updated Successfully');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect('/admin/attribute')      
                ->with('alert-type','error')
                ->with('danger-message','Deleted Successfully');
    }
}
