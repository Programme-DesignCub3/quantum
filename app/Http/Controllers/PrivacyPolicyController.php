<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        $pageSettings->pp_updated_date_formatted = Carbon::parse($pageSettings->pp_updated_date)->locale('id_ID')->isoFormat('D MMMM YYYY');
        $pageSettings->pp_updated_date_cookie_formatted = Carbon::parse($pageSettings->pp_updated_date_cookie)->locale('id_ID')->isoFormat('D MMMM YYYY');

        return view('pages.privacy-policy', [
            'meta_title' => $pageSettings->pp_meta_title,
            'meta_description' => $pageSettings->pp_meta_description,
            'meta_keywords' => $pageSettings->pp_meta_keywords,
            'meta_image' => $pageSettings->pp_meta_image ? asset('storage/' . $pageSettings->pp_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
        ]);
    }
}
