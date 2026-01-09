<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.privacy-policy', [
            'meta_title' => $pageSettings->pp_meta_title,
            'meta_description' => $pageSettings->pp_meta_description,
            'meta_keywords' => $pageSettings->pp_meta_keywords,
            'meta_image' => asset('storage/' . $pageSettings->pp_meta_image),
        ]);
    }
}
