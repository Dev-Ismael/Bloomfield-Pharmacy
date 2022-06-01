<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionOrder extends Model
{

    protected $fillable = [ 'user_id', 'prescription_id' , 'status' ];


    ############################## Relations ################################
    public function user(){
        return  $this -> belongsTo("App\Models\User") ;  
    }

    public function prescription(){
        return  $this -> belongsTo("App\Models\Prescription") ;  
    }
}
