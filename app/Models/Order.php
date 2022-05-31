<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'cart', 'phone', 'address', 'subtotal' , 'taxes_percentage' , 'taxes' , 'shiping' , 'total' , 'status' ];

    protected $casts = [
        'cart' => 'array',
    ];

    ############################## Relations ################################
    public function user(){
        return  $this -> belongsTo("App\Models\User") ;
    }

}
