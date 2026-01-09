<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class GuaranteeInformationController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.support.guarantee-information', [
            'meta_title' => $pageSettings->guarantee_meta_title,
            'meta_description' => $pageSettings->guarantee_meta_description,
            'meta_keywords' => $pageSettings->guarantee_meta_keywords,
            'meta_image' => asset('storage/' . $pageSettings->guarantee_meta_image),
        ]);
    }
}
