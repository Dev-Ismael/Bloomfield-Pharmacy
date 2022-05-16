<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable ;

    protected $fillable = [ 'subcategories_id', 'title', 'slug', 'img' , 'price' , 'quantity'  , 'description' ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    ############################## Relations ################################
    public function subcategory(){
        return  $this -> belongsTo("App\Models\Subcategory") ;  
    }
}
