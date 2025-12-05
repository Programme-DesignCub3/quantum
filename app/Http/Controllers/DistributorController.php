<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = [
            [
                'province' => 'Banten',
                'name' => 'Toko Distributor / Nama Distributor',
                'address' => 'Bojongkamal, Legok, Tangerang Regency, Banten 15820',
                'operational_schedule' => [
                    [
                        'day' => 'Senin - Jumat',
                        'hours' => '07.00-20.00 WIB'
                    ],
                    [
                        'day' => 'Sabtu - Minggu & Hari Libur',
                        'hours' => '07.00-18.00 WIB'
                    ]
                ],
                'sales_products' => ['Kompor', 'Regulator', 'Suku Cadang'],
            ],
            [
                'province' => 'Banten',
                'name' => 'Toko Distributor / Nama Distributor',
                'address' => 'Bojongkamal, Legok, Tangerang Regency, Banten 15820',
                'operational_schedule' => [
                    [
                        'day' => 'Senin - Jumat',
                        'hours' => '07.00-20.00 WIB'
                    ],
                    [
                        'day' => 'Sabtu - Minggu & Hari Libur',
                        'hours' => '07.00-18.00 WIB'
                    ]
                ],
                'sales_products' => ['Kompor', 'Regulator', 'Suku Cadang'],
            ],
            [
                'province' => 'Banten',
                'name' => 'Toko Distributor / Nama Distributor',
                'address' => 'Bojongkamal, Legok, Tangerang Regency, Banten 15820',
                'operational_schedule' => [
                    [
                        'day' => 'Senin - Jumat',
                        'hours' => '07.00-20.00 WIB'
                    ],
                    [
                        'day' => 'Sabtu - Minggu & Hari Libur',
                        'hours' => '07.00-18.00 WIB'
                    ]
                ],
                'sales_products' => ['Kompor', 'Regulator', 'Suku Cadang'],
            ],
        ];

        return view('pages.distributor.distributor', [
            'distributors' => $distributors
        ]);
    }
}
