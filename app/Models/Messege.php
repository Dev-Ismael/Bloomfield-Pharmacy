<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Messege extends Model
{

    protected $fillable = [ 'name' , 'email', 'subject', 'messege' ];


}
