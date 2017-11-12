<?php
namespace App\Helpers;

class Helper {
    
    public static function auth(){
        if(session()->get('user.id') !== null){
            return true;
        }
        
        return false;
    }
}