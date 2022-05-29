<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable ;

    protected $fillable = [ 'subcategory_id', 'title', 'slug', 'img' , 'price' , 'quantity'   , 'has_offer'   , 'offer_percentage'   , 'final_price'   , 'brand'   , 'measurement'  , 'description' ];


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

    
    public function wishlist(){
        return  $this -> belongsTo("App\Models\Wishlist") ;  
    }
    

    public function cart(){
        return  $this -> belongsTo("App\Models\Cart") ;  
    }
}
