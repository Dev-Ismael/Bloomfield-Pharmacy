<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

    protected $fillable = [ 'user_id', 'product_id'];


    
    ############################## Relations ################################
    public function users(){
        return  $this -> hasMany("App\Models\User") ;  
    }
    public function products(){
        return  $this -> hasMany("App\Models\Product") ;  
    }
}
