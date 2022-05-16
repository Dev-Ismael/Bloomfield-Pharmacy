<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Subcategory extends Model
{
    use Sluggable ;

    protected $fillable = [ 'title', 'slug', 'category_id' ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    ############################## Relations ################################
    public function category(){
        return  $this -> belongsTo("App\Models\Category") ;  
    }
}
