<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function Symfony\Component\VarDumper\Dumper\esc;
use App\Classes\Basket;

class BasketController extends Controller
{
    public function basket(){
       
        $categories =  Category::all()->take(5);
        $order = (new Basket())->getOrder();
        return view('basket', compact('order', 'categories'));
    }

    public function basketConfirm(Request $request){
        $categories =  Category::all()->take(5);
        $email = Auth::check() ? Auth::user()->email : $request->email;
     
        $success = (new Basket())->saveOrder($request->name, $request->phone, $email);
        
        if ($success) {
            session()->flash('success', 'ваш заказ принят на обработку');
        }else{
            session()->flash('warning', 'шо то не так');
        }
        
        Order::eraseOrderSum();
        
        return redirect()->route('index');
    }

    public function basketPlace(){
        $categories =  Category::all()->take(5);
        $basket = new Basket();
        $order = $basket->getOrder();
        if (!$basket->countAvailable()) {
            session()->flash('warning', 'product not avaible ');
            return redirect()->route('basket');
        }
        return view('order', compact(['categories', 'order']));
    }
 
    public function  basketAdd(Product $product){
         $categories =  Category::all()->take(5);
         $result =  (new Basket(true))->addProduct($product);
       if ($result) {
          session()->flash('success', 'product been added ' . $product->name);
          }else{ 
            session()->flash('warning', 'product not avaible ' . $product->name);
          }
 
      return redirect()->route('basket');
     }

    public function basketRemove(Product $product){
        (new Basket())->removeProduct($product);    
        $categories =  Category::all()->take(5);
        session()->flash('warning', 'product been deleted ' . $product->name);
         return redirect()->route('basket');
     }
}
