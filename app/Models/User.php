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
        'name', 'first_name', 'last_name', 'email', 'email_2', 'password', 'phone', 'phone_2', 'state', 'address', 'address_2', 'address_3', 'role'
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
    ];

    
    ############################## Relations ################################
    public function prescriptions(){
        return  $this -> hasMany("App\Models\Prescription") ;  
    }
    

    public function wishlist(){
        return  $this -> belongsTo("App\Models\Wishlist") ;  
    }

    public function cart(){
        return  $this -> belongsTo("App\Models\Cart") ;  
    }

}
