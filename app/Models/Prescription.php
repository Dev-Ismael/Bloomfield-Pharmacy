<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'img', 'age', 'gender', 'img' , 'additional_details' , 'medicine'  , 'validation' , 'schedule_orders' , 'scheduled_days' , 'scheduled_start'];

    protected $casts = [
        'medicine' => 'array',
        // 'scheduled_start' => 'datetime',
    ];

    ############################## Relations ################################
    public function user(){
        return  $this -> belongsTo("App\Models\User") ;  
    }

}
