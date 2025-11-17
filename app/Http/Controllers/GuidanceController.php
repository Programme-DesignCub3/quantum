<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidanceController extends Controller
{
    public function index()
    {
        return view('pages.support.guidance');
    }
}
