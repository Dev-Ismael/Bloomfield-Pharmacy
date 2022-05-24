<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    public function index($categorySlug, $subCategorySlug)
    {
        // get category
        $category = Category::where("slug", $categorySlug)->with('subcategories')->first();

        // if Category Not Found
        if (!$category) {
            return redirect('/');
        }

        // get subcategory
        $subcategory = Subcategory::where("slug", $subCategorySlug)->first();

        // if Subcategory Not Found
        if (!$subcategory) {
            return redirect('/');
        }

        // get products
        $products = Product::where("subcategory_id", $subcategory->id)->get();
        return view('web.category', compact('category', 'products'));
    }
}
