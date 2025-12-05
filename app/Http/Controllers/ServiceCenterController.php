<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceCenterController extends Controller
{
    public function index()
    {
        $serviceCenters = [
            [
                'province' => 'Jakarta',
                'name' => 'Quantum Service Center Jakarta',
                'address' => 'Gedung Office 8 Jl. Senopati no 8B Level 18A Senayan, Keb. Baru, Jakarta 12190',
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
                'service_products' => ['Kompor', 'Regulator'],
                'sales_products' => ['Suku Cadang'],
            ],
        ];

        $mitraServices = [
            [
                'province' => 'Jakarta',
                'name' => 'Quantum Mitra Service Tangerang',
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
                'service_products' => ['Kompor', 'Regulator'],
                'sales_products' => ['Suku Cadang'],
            ],
        ];

        return view('pages.support.service-center', [
            'service_centers' => $serviceCenters,
            'mitra_services' => $mitraServices,
        ]);
    }
}
