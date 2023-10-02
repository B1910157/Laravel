<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
        
    // }

    public function test(Request $request)
    {
        echo "Test middleware";
    }
    public function login(Request $request)
    {
        // var_dump(Auth::user());
        return view('auth.login-admin');
    }
    public function checkLogin1(){
        if(Auth::check()){
            return redirect('show.categories');
        }else {
            return view('auth.login-admin');
        }

    }
    public function checkLogin(Request $payload){
        $data = $payload->input();
        $email = $data['email'];
        $password = $data['password'];
        // echo $email;
        // echo $password;
        // $hello =  News::where('id', '=', $id, 'and', 'status', '=', $status)->get();
        $account = Admin::where('email', '=', $email )->where('password', '=', $password)->get();
        // dd(count($account));
        // print_r($account);
        if(count($account) == 1){
           echo "Login thành công";
           return redirect()->route('show.categories');
        }
       else{
        session()->flash('login-error', 'Sai email hoặc password!!!');
        return redirect()->route('login.admin');
       }
        // dd($payload);

    }
}
