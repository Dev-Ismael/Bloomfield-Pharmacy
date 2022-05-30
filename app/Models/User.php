<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email', 'email_2', 'password', 'phone', 'state', 'address', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone' => 'array',
        'address' => 'array',
    ];


    ############################## Relations ################################
    public function prescriptions(){
        return  $this -> hasMany("App\Models\Prescription") ;
    }


    public function wishlist_products(){
        return  $this -> belongsToMany("App\Models\Product", "wishlists") ;
        // return  $this -> belongsToMany("App\Models\Product") ;
    }


    public function cart_products(){
        return  $this -> belongsToMany("App\Models\Product", "carts") ;
    }

    public function orders(){
        return  $this -> hasMany("App\Models\Order") ;
    }

}
