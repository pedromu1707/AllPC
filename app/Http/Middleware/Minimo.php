<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cart;

class Minimo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cart::getTotal()>0 &&auth()->check())
        return $next($request);
            else{
              if(auth()->check()){
                return redirect('/cart-show');
                }else{
                    return redirect('/login');
                }
            
        }

        
   
    }
}