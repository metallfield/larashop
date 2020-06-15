<?php

namespace App\Http\Controllers\Person;
use App\Category;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {    $categories =  Category::all()->take(5);
        $orders = Auth::user()->orders()->Active()->paginate(8);
        // dd($orders); 
        return view('auth.orders.index', compact(['categories', 'orders']));
    }
    public function show(Order $order){
        $categories =  Category::all()->take(5);
        if (!Auth::user()->orders->contains($order)) {
         return back();
        }
        return view('auth.orders.show', compact('order', 'categories'));
    }
}
