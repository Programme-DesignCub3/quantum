<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = [
            [
                'category' => 'Kompor',
                'name' => 'Kompor Gas QGC - 101 AB Black',
                'image' => asset('images/catalog-1.jpg')
            ],
            [
                'category' => 'Regulator & Selang Gas',
                'name' => 'Regulator Gas QRL 03',
                'image' => asset('images/catalog-2.jpg')
            ],
            [
                'category' => 'Regulator & Selang Gas',
                'name' => 'Regulator Gas QRH - 18',
                'image' => asset('images/catalog-3.jpg')
            ],
            [
                'category' => 'Regulator & Selang Gas',
                'name' => 'Selang Gas QPH - 011',
                'image' => asset('images/catalog-4.jpg')
            ],
            [
                'category' => 'Kompor',
                'name' => 'Kompor Gas QGC - 101 AB',
                'image' => asset('images/catalog-5.jpg')
            ],
        ];

        return view('pages.distributor.catalog', [
            'catalogs' => $catalogs
        ]);
    }
}
