<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        // validate search and redirect back
        $this->validate($request, [
            'searchQuery'     =>  ['required', 'string', 'max:55'],
        ]);
        $searchQuery = $request->searchQuery;


        if( $request->has('offer_filter') && $request->offer_filter == '1' ){
            $products = Product::where([
                ['title', 'like', "%{$request->searchQuery}%"],
                ['has_offer' , '=' , '1' ]
            ])->paginate( 30 );
            return view("web.search",compact("products","searchQuery"));
        }

        $products = Product::where('title', 'like', "%{$request->searchQuery}%")->paginate( 30 );
        return view("web.search",compact("products","searchQuery"));
    }

}