<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Messege;
use App\Models\Order;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $users = User::count();
        $categories = Category::count();
        $subcategories = Subcategory::count();
        $products = Product::count();
        $orders = Order::count();
        $prescriptions = Prescription::count();
        $messeges = Messege::count();

        return view('admin.dashboard',
            compact('users', 'categories', 'subcategories',
            'products', 'orders', 'prescriptions', 'messeges' ));
    }

}
