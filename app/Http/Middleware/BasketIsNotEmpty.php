<?php

namespace App\Http\Middleware;

use Closure;
use App\Order;
class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $orderId = session('orderId');
        
        if (!is_null($orderId) && Order::getFullPrice() > 0) {
            return $next($request);
        }
        session()->flash('warning', 'basket is empty');
                return redirect()->route('index');
        
    }
}

