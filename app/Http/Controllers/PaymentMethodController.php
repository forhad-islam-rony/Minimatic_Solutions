<?php

namespace App\Http\Controllers;

use \App\Models\PaymentMethod;
use \App\Models\Address;
use \App\Models\Cart;
use \App\Models\Product;
use \App\Models\OrderItems;
use \App\Models\Order;
use \App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;

class PaymentMethodController extends Controller
{

    public function index()
    {
        $paymentMethods = PaymentMethod::get();
        $columns = ['id', 'name', 'available'];
        $tableName = 'paymentMethod';
        return view('admin.pages.paymentMethod.index', compact('paymentMethods', 'columns', 'tableName'));
    }

    public function add()
    {
        return view('admin.pages.paymentMethod.add');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'available' => ''
        ]);
        if (isset($_POST['available'])) {
            $data = array_merge(
                $data,
                ['available' => '1']
            );
        } else {
            $data = array_merge(
                $data,
                ['available' => '0']
            );
        }
        PaymentMethod::create($data);
        return redirect('/admin/paymentMethod')->with('message', 'added Successfully');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.pages.paymentMethod.edit', compact('paymentMethod'));
    }

    public function update(PaymentMethod $paymentMethod)
    {
        $data = request()->all();
        request()->validate([
            'name' => 'required',
            'available' => ''
        ]);
        if (isset($_POST['available'])) {
            $data = array_merge(
                $data,
                ['available' => '1']
            );
        } else {
            $data = array_merge(
                $data,
                ['available' => '0']
            );
        }
        $paymentMethod->update($data);
        $paymentMethods = PaymentMethod::get();
        return redirect('/admin/paymentMethod')->with('message', 'Updated Successfully');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect('/admin/paymentMethod')->with('danger-message', 'Deleted Successfully');
    }

    public function show()
    {
        $address = Address::find(request('address'));
        $paymentMethods = PaymentMethod::get();
        return view('pages.paymentMethod', compact('address', 'paymentMethods'));
    }
}
