<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CustomMethod extends Model
{
    public static function lastName($name){
        $lastname = explode(' ',$name);
        if(!empty($lastname[1])){
         return $lastname[1];
        }else{
        return $name;
        }
    }
    
    
}


