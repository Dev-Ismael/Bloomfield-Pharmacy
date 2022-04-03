<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    public function index()
    {
        return view('web.returns');
    }
}
