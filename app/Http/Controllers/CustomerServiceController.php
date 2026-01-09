<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.support.customer-service', [
            'meta_title' => $pageSettings->cs_meta_title,
            'meta_description' => $pageSettings->cs_meta_description,
            'meta_keywords' => $pageSettings->cs_meta_keywords,
            'meta_image' => asset('storage/' . $pageSettings->cs_meta_image),
        ]);
    }
}
