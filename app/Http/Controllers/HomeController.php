<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;

class HomeController extends Controller
{
    public function index(){
		return view('admin.index');
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


}
