<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.terms-conditions', [
            'meta_title' => $pageSettings->tnc_meta_title,
            'meta_description' => $pageSettings->tnc_meta_description,
            'meta_keywords' => $pageSettings->tnc_meta_keywords,
            'meta_image' => asset('storage/' . $pageSettings->tnc_meta_image),
        ]);
    }
}
