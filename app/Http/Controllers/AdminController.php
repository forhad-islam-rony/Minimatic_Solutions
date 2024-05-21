<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    protected $guarded = [];
    public function view()
    {
        return view('admin.pages.index');
    }

    public function signup()
    {
        return view('admin.pages.signup');
    }

    public function signin()
    {
        return view('admin.pages.login');
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'email'=>'required|unique:admin',
            'password'=>['required']
        ]);
        $hashedPassword = Hash::make(request()->password);
        $data = array_merge(
            $data,
            ['password'=>$hashedPassword]
        );
        Admin::create($data);
        $admin = Admin::where('email','=',$data['email'])->first();
        request()->session()->put('loginId',$admin->id);
        request()->session()->put('adminName',$admin->name);
        return redirect('/admin/dashboard')
                ->with('alert-type','success')
                ->with('message','Admin Added Succesfully');
    }

    public function check()
    {
        $data = request()->validate([
            'email'=>'required',
            'password'=>'required',  
        ]);
        $admin = Admin::where('email','=',$data['email'])->first();
        if($admin)
        {
            if(Hash::check($data['password'], $admin['password']))
            {
                request()->session()->put('loginId',$admin->id);
                request()->session()->put('adminName',$admin->name);
                return redirect('/admin/dashboard')
                        ->with('alert-type','success')
                        ->with('message','Login Successfully');
            }
            else
            {
                return redirect('/admin')
                        ->with('alert-type','error')
                        ->with('message','Password is Wrong');
            }
        }
        else
        {
            return redirect('/admin')
                    ->with('alert-type','error')
                    ->with('message','E-mail is not Registered');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')
              ->with('alert-type','error')
              ->with('message','Logout Successfully');
    }
}
