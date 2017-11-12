<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    
    public function index(){
         
        if(!Helper::auth()){
            return redirect('/');
        }
        
        return view('home');
    }
}
