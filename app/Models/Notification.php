<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Notification extends Model
{

    protected $fillable = [ 'link', 'content', 'as_read' ];




}
