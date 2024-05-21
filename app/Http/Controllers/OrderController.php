<?php

namespace App\Http\Controllers;

use App\Notifications\UserNotification;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use \App\Models\PaymentMethod;
use \App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders= Order::orderBy('updated_at','DESC')->get();
        $columns = ['id','user_id', 'total', 'status', 'Edit', 'Delete'];
        $tableName= 'Orders';
        return view('admin.pages.orders.index',compact('columns','orders','tableName'));
    }

    public function makeOrder()
    {
        if(!Session::has('cartId')){
            return redirect('/');
        }
        $data = request()->all();
        DB::beginTransaction();
        $cart = Cart::whereIn('user_id', [Session::get('userId')])->get();
        $orderItems = array_merge(
            ['user_id' => Session::get('userId')],
        );
        $total = 0;
        for ($i = 0; $i < count($cart); $i++) {
            $productIds[$i]= $cart[$i]->product_id;
            $pro= Product::find($productIds[$i]);
            $vendorIds[$i]= $pro->vendor()->first()->id;
            $quantities[$i] = $cart[$i]->quantity;
            $total += $quantities[$i] * $pro->price;
        }
        $productIds = json_encode($productIds);
        $quantities = json_encode($quantities);
        $vendorIds = json_encode($vendorIds);
        try {
            DB::insert('insert into order_items (user_id, product_ids, vendor_ids, quantity, total) values (?, ?, ?, ?, ?)', [Session::get('userId'), $productIds, $vendorIds, $quantities, $total]);
            $data = array_merge(
                $data,
                ['user_id' => Session::get('userId')],
                ['total' => $total],
            );
            $orderItemsId = OrderItems::whereIn('user_id', [Session::get('userId')])->get();
            $orderItemsId = $orderItemsId[count($orderItemsId) - 1]->id;
            for($i=0;$i<count($cart);$i++){
                $product= Product::find($cart[$i]->product_id);
                $newSold= $product->sold_quantity+$cart[$i]->quantity;
                $product->update(['sold_quantity'=>$newSold]);
                $total = $cart[$i]->quantity * $product->price;
                DB::insert('insert into ordert (user_id, vendor_id, order_items_id, product_id, quantity, address, total) values (?, ?, ?, ?, ?, ?, ?)', [$data['user_id'], $product->vendor()->first()->id, $orderItemsId, $product->id, $cart[$i]->quantity,Address::find($data['address_id'])->address, $total]);
                $notification=['title'=>'Order '.$orderItemsId,'message'=>'Your Item '.$product->name .' will be soon dispached'];
                User::find(Session::get('userId'))->notify(new UserNotification($notification));
            }
            DB::delete('delete from cart where user_id = ?', [Session::get('userId')]);
            DB::commit();
            Session::forget('cartId');
            return redirect('/')
                    ->with('alert-type','success')
                    ->with('message','Order Placed Successfully');
        } catch (Exception $e) {
            DB::rollback();
        }
        return redirect()->back()
                ->with('alert-type','error')
                ->with('message','Please Try Again After Some Time');
    }

    public function edit(Order $order)
    {
        $status= ['pending'=>'pending',
                    'dispatch'=>'Ready To Dispatch',
                    'onWay'=>'On The Way',
                    'arrived'=>'Arrived Final Destination',
                    'delivery'=>'Out for delivery',
                    'cancelled'=>'Cancelled',
                    'delivered'=>'Product Delivered',
                    'rejected'=>'Rejected'];
        return view('admin.pages.orders.edit',compact('order','status'));
    }

    public function update(Order $order)
    {
        $data= request()->all();
        $order->update($data);
        return redirect('/admin/orders');
    }

    public function receipt()
    {
        $user= User::find(Session::get('userId'));
        $cart= $user->cartItems;
        $orderTotal=0;
        for($i=0;$i<$cart->count();$i++){
            $product= Product::find($cart[$i]['product_id']);
            $total=$product->price*$cart[$i]->quantity;
            $data[$i]=[
                'name'=>$product->name,
                'quantity'=>$cart[$i]->quantity,
                'price'=>$product->price,
                'total'=>$total,
            ];
            $orderTotal+= $total;
        }
        $addressId= request('address_id');
        $address=Address::find($addressId)->address;
        $payment= request('payment');
        return view('pages.receipt',compact('user','addressId','address','orderTotal','data','payment'));
    }
    
    public function thankYou()
    {
        return view('pages.ThankYou');
    }

    public function cancelOrder(Order $order){
        $data=(
            ['status'=>'cancelled']
        );
        $order->update($data);
        return redirect('/orderHistory');

    }
}
