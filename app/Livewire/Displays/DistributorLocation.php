<?php

namespace App\Livewire\Displays;

use App\Settings\PageSettings;
use Livewire\Component;

class DistributorLocation extends Component
{
    public function render(PageSettings $pageSettings)
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

        $provinces = [
            [
                'name' => 'Jabodetabek',
                'slug' => 'jabodetabek',
            ],
            [
                'name' => 'Jawa Barat',
                'slug' => 'jawa-barat',
            ],
            [
                'name' => 'Jawa Tengah',
                'slug' => 'jawa-tengah',
            ],
            [
                'name' => 'Jawa Timur',
                'slug' => 'jawa-timur',
            ],
            [
                'name' => 'Sumatera',
                'slug' => 'sumatera',
            ],
            [
                'name' => 'Kalimantan',
                'slug' => 'kalimantan',
            ],
            [
                'name' => 'Bali',
                'slug' => 'bali',
            ],
            [
                'name' => 'Papua',
                'slug' => 'papua',
            ],
        ];

        return view('livewire.displays.distributor-location', [
            'page_settings' => $pageSettings,
            'distributors' => $distributors,
            'provinces' => $provinces,
        ]);
    }
}
