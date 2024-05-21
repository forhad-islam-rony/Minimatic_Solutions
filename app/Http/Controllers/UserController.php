<?php

namespace App\Http\Controllers;

use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItems;
use App\Models\Vendor;
use App\Models\Wishlist;
use App\Models\ProductComment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $columns = ['id', 'name', 'email', 'mobile'];
        $tableName = 'user';
        return view('admin.pages.user.index', compact('users', 'columns', 'tableName'));
    }

    public function notification()
    {
        $notifications = User::find(Session::get('userId'))->notifications;
        foreach ($notifications as $key => $notification) {
            if (array_key_exists('date', $notification['data']) && strtotime($notification['data']['date']) > strtotime(date('Y-m-d'))) {
                unset($notifications[$key]);
            }
        }
        return view('pages.notification', compact('notifications'));
    }

    public function wishlist(Product $product)
    {
        if (Session::has('userId')) {
            $wishlist = Wishlist::where('user_id', Session::get('userId'))->where('product_id', $product->id)->first();
            if ($wishlist) {
                $wishlist->delete();
                return redirect()->back()->with('message', 'Removed from wishlist')->with('alert-type', 'success');
            } else {
                $wishlist = Wishlist::firstOrCreate([
                    'user_id' => Session::get('userId'),
                    'product_id' => $product->id,
                ], ['time' => request('date')]);
                $notification = [
                    'title' => 'Wishlist Item',
                    'message' => 'Your Wishlist Item ' . $product->name . ' is past your Buying Date',
                    'date' => request('date')
                ];
                User::find(Session::get('userId'))->notify(new UserNotification($notification));
                return redirect()->back()->with('message', 'Added to wishlist')->with('alert-type', 'success');
            }
        }
        return redirect()->back()->with('message', 'Please login first')->with('alert-type', 'error');
    }

    public function removeWishlist(Product $product)
    {
        $wishlist = Wishlist::where('user_id', Session::get('userId'))->where('product_id', $product->id)->first();
        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('message', 'Removed from wishlist')->with('alert-type', 'success');
        }
        return redirect()->back()->with('message', 'Wishlist item not found')->with('alert-type', 'error');
    }

    public function add()
    {
        $tableName = 'user';
        return view('admin.pages.user.add', compact('tableName'));
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
            return redirect('/vendor/')->with('alert-type', 'success')->with('message', 'Added Successfully');
        }
    }

    public function edit(User $user)
    {
        return view('admin.pages.user.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:11',
        ]);

        $user->update($data);

        if (Session::has('userId')) {
            Session::put('userName', $data['name']);
        }

        if (request()->session()->has('loginId')) {
            return redirect('/admin/user')->with('alert-type', 'success')->with('message', 'Updated Successfully');
        }

        $addresses = request('address');
        if ($addresses) {
            $this->updateAddresses($addresses);
        }

        return redirect('/profile')->with('alert-type', 'success')->with('message', 'Updated Successfully');
    }

    protected function updateAddresses($addresses)
    {
        $userId = Session::get('userId');
        $existingAddresses = Address::where('user_id', $userId)->get();

        if (count($addresses) < count($existingAddresses)) {
            Address::where('user_id', $userId)->delete();
        }

        foreach ($existingAddresses as $index => $address) {
            if (isset($addresses[$index])) {
                $address->update(['address' => $addresses[$index]]);
            }
        }

        for ($i = count($existingAddresses); $i < count($addresses); $i++) {
            Address::create([
                'address_number' => $i + 1,
                'user_id' => $userId,
                'address' => $addresses[$i]
            ]);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/user')->with('alert-type', 'error')->with('message', 'Deleted Successfully');
    }

    public function check()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            request()->session()->put('userId', $user->id);
            request()->session()->put('userName', $user->name);
            return redirect()->back()->with('alert-type', 'success')->with('message', 'Login Successfully');
        }

        return redirect('/login')->with('message', 'Invalid email or password')->with('color', 'danger');
    }

    public static function isUser()
    {
        return Session::has('userId');
    }

    public function profile()
    {
        $user = $this->getUser(Session::get('userId'));
        return view('pages.profile', compact('user'));
    }

    public function wallet()
    {
        return view('pages.wallet');
    }

    public function orderHistory()
    {
        $tableName = 'Order History';
        $orders = Order::where('user_id', Session::get('userId'))->get();

        if ($orders->isEmpty()) {
            return view('pages.orderHistory', [
                'tableName' => $tableName,
                'columns' => [],
                'orders' => [],
                'message' => 'You have no orders',
                'color' => false
            ]);
        }

        $status = [
            'pending' => 'Pending',
            'dispatch' => 'Ready To Dispatch',
            'onWay' => 'On The Way',
            'arrived' => 'Arrived Final Destination',
            'delivered' => 'Product Delivered',
            'delivery' => 'Out for Delivery',
            'cancelled' => 'Cancelled',
            'rejected' => 'Rejected'
        ];

        foreach ($orders as $order) {
            $order->orderId = $order->order_items_id;
            $order->product = Product::find($order->product_id)->name ?? 'Unknown';
            $order->status = $status[$order->status] ?? 'Unknown';
        }

        $columns = ['Products', 'total', 'time', 'status'];
        $color = true;

        return view('pages.orderHistory', compact('tableName', 'columns', 'orders', 'color'));
    }

    public static function getUser($id)
    {
        return User::findOrFail($id);
    }

    public function comment()
    {
        $data = request()->validate(['comment' => 'required']);
        $user = User::find(Session::get('userId'));
        $message = '';

        if (request('submitType') == 'Update') {
            $comment = ProductComment::where('product_id', request('product_id'))->where('user_id', $user->id)->first();
            $comment->update(['comment' => request('comment')]);
            $message = 'Comment Updated';
        } else {
            ProductComment::firstOrCreate([
                'product_id' => request('product_id'),
                'user_id' => $user->id,
            ], ['comment' => request('comment')]);
            $message = 'Comment Added';
        }

        return redirect()->back()->with('alert-type', 'success')->with('message', $message);
    }

    public function removeComment(Product $product)
    {
        $comment = $product->comments()->where('user_id', Session::get('userId'))->first();
        if ($comment) {
            $comment->delete();
            return redirect()->back()->with('alert-type', 'error')->with('message', 'Comment Removed');
        }
        return redirect()->back()->with('alert-type', 'error')->with('message', 'Comment not found');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('alert-type', 'success')->with('message', 'Successfully Logged Out');
    }
}
