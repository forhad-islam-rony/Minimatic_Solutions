<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Session;

class VendorOrderController extends Controller
{
    public function index()
    {
        
        $orders = DB::select('select * from ordert where vendor_id = ? order by time desc', [Session::get('vendorId')]);

       
        $columns = ['Orderid', 'user_id', 'product_name', 'total', 'status'];
        $tableName = 'Orders';

        $orders = json_decode(json_encode($orders), true);

        for ($i = 0; $i < count($orders); $i++) {
            $orders[$i]['Orderid'] = $orders[$i]['order_items_id'];
            $product = Product::find($orders[$i]['product_id']);
            if ($product) {
                $orders[$i]['product_name'] = $product->name;
            } else {
                $orders[$i]['product_name'] = 'Unknown Product'; 
            }
        }

        return view('vendor.pages.orders.index', compact('columns', 'orders', 'tableName'));
    }

    public function edit(Order $order)
    {
       
        $status = [
            'pending' => 'Pending',
            'dispatch' => 'Ready To Dispatch',
            'onWay' => 'On The Way',
            'arrived' => 'Arrived Final Destination',
            'delivery' => 'Out for delivery',
            'delivered' => 'Product Delivered',
            'rejected' => 'Rejected'
        ];

        
        return view('vendor.pages.orders.edit', compact('order', 'status'));
    }

    public function update(Order $order)
    {
        
        $data = request()->all();

        
        $order->update($data);

        return redirect('/vendor/orders');
    }
}
