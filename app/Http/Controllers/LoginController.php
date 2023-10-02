<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(){
        return view('auth.login-admin');

    } 
    public function CheckLogin(Request $request){




        
    //    dd($request);
       $a = $request->only('email', 'password');
    //    dd($a);
        $b = Auth::attempt($a);
        dd($b);
        if (Auth::attempt($a)) {
                // Xác thực thành công
                // return redirect()->route('admin.categories');
            }
   
        // // Xác thực thất bại
        return redirect('login')->withErrors('Thông tin đăng nhập không chính xác');
    }
}
