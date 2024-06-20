<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\Order;
class HomeController extends Controller
{
    public function index(){
		$user = User::where('usertype','user')->get()->count();
		$product = Product::all()->count();
		$order = Order::all()->count();
		$delivered = Order::where('status','Delivered')->get()->count();
		return view('admin.index',compact('user','product','order','delivered'));
	}

	public function home(){
		$product = Product::all();
		if(Auth::id())
		{
		$user = Auth::user();
		$userid = $user->id;
		$count = cart::where('user_id', $userid)->count();
		}
		else{
			$count = '';
		}
		return view('home.index',compact('product','count'));
	}

	public function login_home(){
		$product = Product::all();
		if(Auth::id())
		{
		$user = Auth::user();
		$userid = $user->id;
		$count = cart::where('user_id', $userid)->count();
		}
		else{
			$count = '';
		}
		return view('home.index',compact('product','count'));
	}

	public function product_details($id){
		$data = Product::find($id);
		if(Auth::id())
		{
		$user = Auth::user();
		$userid = $user->id;
		$count = cart::where('user_id', $userid)->count();
		}
		else{
			$count = '';
		}
		return  view('home.product_details',compact ('data','count'));
	} 

	public function add_cart($id){
		$product_id = $id;
		$user = Auth::user();
		$user_id = $user->id;
		$data = new cart;
		$data->user_id = $user_id;
		$data->product_id = $product_id;
		$data->save();
		toastr()->success('Product Added to the Card Successfully.');
		return redirect()->back();

	}
	public function mycard(){
		if(Auth::id())
		{
		$user = Auth::user();
		$userid = $user->id;
		$count = cart::where('user_id', $userid)->count();
		$cart = cart::where('user_id', $userid)->get();
		}
		return view('home.mycart',compact('count','cart'));
	}

	public function remove($id){
		$cart = cart::find($id);
		$cart->delete();
		sweetalert()->error('Are you sure to Delete this.');
		return redirect()->back();

	}

	public function confirm_order(Request $request){
		$name = $request->name;
		$address = $request->address;
		$phone = $request->phone;
		$userid = Auth::user()->id;
		$cart = cart::where('user_id',$userid)->get();

		foreach($cart as $carts){
			$order = new Order;
			$order->name = $name;
			$order->rec_address = $address;
			$order->phone = $phone;
			$order->user_id = $userid;
			$order->product_id = $carts->product_id;
			$order->save();
			
		}

		$cart_remove = cart::where('user_id',$userid)->get();

		foreach($cart_remove as $remove){
			$data = cart::find($remove->id);
			$data->delete();
		}
		toastr()->success('Product Orded Successfully.');
		return redirect()->back(); 

	}

	public function myorders(){
		$user = Auth::user()->id;
		$count = Cart::where('user_id',$user)->get()->count();
		$order = Order::where('user_id',$user)->get();

		return view('home.order',compact('count','order'));
	}


}
