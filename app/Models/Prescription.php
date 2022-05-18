<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'img', 'age', 'img' , 'additional_details' , 'medicine'  , 'validation' , 'schedule_orders' ];

    protected $casts = [
        'medicine' => 'array',
    ];

    ############################## Relations ################################
    public function user(){
        return  $this -> belongsTo("App\Models\User") ;  
    }

}
