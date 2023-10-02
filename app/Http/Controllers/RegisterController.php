<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function store(Request $request){
        // dd($request);
        $data = $request->input();
        // dd($data);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],    
        ]);
        return redirect()->route('testLogin');

    }
}
