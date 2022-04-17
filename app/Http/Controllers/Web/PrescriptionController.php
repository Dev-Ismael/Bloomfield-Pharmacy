<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        return view('web.prescriptions');
    }

    public function order_prescription()
    {
        return view('web.order_prescription');
    }
}
