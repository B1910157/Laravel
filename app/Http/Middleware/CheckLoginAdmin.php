<?php

namespace App\Http\Middleware;

use Closure;
// use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
    public function handle(Request $request, Closure $next)
    {
        // echo "Middleware";
       echo "hi";
        print_r($this->login());
        echo "h";
        if(!$this->login()){
       
        //    return redirect(route('test'));
        }
        return $next($request);
    }
    public function login(){
       $acc = Auth::user();
       print_r($acc);
        // return $acc;
    }
}
