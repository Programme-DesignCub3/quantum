<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class ContactController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        $call_center = new PhoneNumber($pageSettings->contact_cc_number, 'ID');
        $whatsapp = new PhoneNumber($pageSettings->contact_wa_number, 'ID');

        $pageSettings->contact_cc_number_formatted = $call_center->formatE164();
        $pageSettings->contact_wa_number_formatted = $whatsapp->formatE164();

        return view('pages.support.contact', [
            'meta_title' => $pageSettings->contact_meta_title,
            'meta_description' => $pageSettings->contact_meta_description,
            'meta_keywords' => $pageSettings->contact_meta_keywords,
            'meta_image' => $pageSettings->contact_meta_image ? asset('storage/' . $pageSettings->contact_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
        ]);
    }
}
