<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuaranteeInformationController extends Controller
{
    public function index()
    {
        return view('pages.support.guarantee-information');
    }
}
