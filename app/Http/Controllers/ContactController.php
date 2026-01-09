<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.support.contact', [
            'meta_title' => $pageSettings->contact_meta_title,
            'meta_description' => $pageSettings->contact_meta_description,
            'meta_keywords' => $pageSettings->contact_meta_keywords,
            'meta_image' => asset('storage/' . $pageSettings->contact_meta_image),
        ]);
    }
}
