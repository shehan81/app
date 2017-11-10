<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
        
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where("username", $request->username)->get();
        if($user){
            dd($user);
        }
        return view('login');
    }
}
