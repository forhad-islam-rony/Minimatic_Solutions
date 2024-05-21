<?php

namespace App\Http\Controllers;
use \App\Models\Advertisment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AdvertismentController extends Controller
{
    public function index()
    {
        $advertisments= Advertisment::get();
        $tableName= 'advertisment';
        $columns = ['id', 'url', 'duration'];
        return view('admin.pages.advertisment.index',compact('columns','advertisments','tableName'));
    }

    public function add()
    {
        return view('admin.pages.advertisment.add');
    }

    public function edit(Advertisment $advertisment)
    {
        return view('admin.pages.advertisment.edit',compact('advertisment'));
    }

    public function store()
    {
        $data=request()->validate([
            'url'=>'required|url',
            'image'=>'required',
            'position'=>'',
            'duration'=>'required|numeric|gt:0'
        ]);
        $imagePath = request('image')->store('advertisment', 'public');
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
        Advertisment::create($data);
        return redirect('/admin/advertisment')->with('message', 'added Successfully');
    }

    public function update(Advertisment $advertisment)
    {
        $data=request()->validate([
            'url'=>'required|url',
            'image'=>'',
            'position'=>'',
            'duration'=>'required|numeric|gt:0'
        ]);
        if(request('image')!=null){
            $imagePath = request('image')->store('advertisment', 'public');
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
        $advertisment->update($data);
        return redirect('/admin/advertisment')->with('message', 'Updated Successfully');
    }

    public function destroy(Advertisment $advertisment)
    {
        $advertisment->delete();
        return redirect('/admin/advertisment')->with('danger-message', 'Deleted Successfully');
    }
}
