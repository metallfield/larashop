<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Order;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    /**
     * Show the application dashboard.
     *
     *  
     */ 
    public function index()
    {    $categories =  Category::all()->take(5);
        $orders = Order::Active()->paginate(8);
        // dd($orders); 
        return view('auth.orders.index', compact(['categories', 'orders']));
    }
    public function show(Order $order){
        $categories =  Category::all()->take(5);
        $products = $order->products()->withTrashed()->get();
        return view('auth.orders.show', compact('order', 'categories', 'products'));
    }

}
