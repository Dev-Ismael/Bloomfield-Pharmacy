<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionOrders extends Model
{

    protected $fillable = [ 'user_id', 'prescription_id'];


}
