<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function index()
    {
        return view('pages.support.customer-service');
    }
}
