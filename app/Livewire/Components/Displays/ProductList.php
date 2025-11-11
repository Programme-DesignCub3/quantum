<?php

namespace App\Livewire\Components\Displays;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ProductList extends Component
{
    public $category;

    public string $size = 'sm';
    public string $direction = 'col';

    protected function getAllProduct()
    {
        return [
            [
                'image' => asset('images/product-1.jpg'),
                'category' => 'Kompor Gas',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 AB Putih',
                'slug' => 'qgc-101-ab-putih',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Elektrik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '256.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'label' => 'Best Seller',
                'image' => asset('images/product-2.jpg'),
                'category' => 'Kompor Gas',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 AB Hitam',
                'slug' => 'qgc-101-ab-hitam',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Elektrik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '256.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-3.jpg'),
                'category' => 'Kompor Gas',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 A',
                'slug' => 'qgc-101-a',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Mekanik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '180.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-4.jpg'),
                'category' => 'Regulator',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRL-03',
                'slug' => 'qrl-03',
                'specs' => [
                    'power_type' => 'Kunci Tunggal',
                    'fuel_type' => 'Tekanan Rendah',
                ],
                'price' => '60.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-5.jpg'),
                'category' => 'Regulator',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRH-09',
                'slug' => 'qrh-09',
                'specs' => [
                    'power_type' => 'Kunci Tunggal',
                    'fuel_type' => 'Tekanan Rendah',
                ],
                'price' => '256.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-6.jpg'),
                'category' => 'Regulator dan Selang Gas',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRH-032',
                'slug' => 'qrh-032',
                'specs' => [
                    'length_type' => '1,8 Meter',
                    'fuel_type' => 'Tekanan Rendah',
                ],
                'price' => '180.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-7.jpg'),
                'category' => 'Sparepart',
                'category_slug' => 'suku-cadang',
                'name' => 'Burner Kuningan',
                'slug' => 'burner-kuningan',
                'price' => '100.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-8.jpg'),
                'category' => 'Sparepart',
                'category_slug' => 'suku-cadang',
                'name' => 'Tatakan Kompor',
                'slug' => 'tatakan-kompor',
                'specs' => [
                    'furnace_type' => '5 Kaki',
                ],
                'price' => '50.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
        ];
    }

    protected function getStoveProduct()
    {
        return [
            [
                'image' => asset('images/product-1.jpg'),
                'category' => 'Kompor Gas',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 AB Putih',
                'slug' => 'qgc-101-ab-putih',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Elektrik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '256.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'label' => 'Best Seller',
                'image' => asset('images/product-2.jpg'),
                'category' => 'Kompor Gas',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 AB Hitam',
                'slug' => 'qgc-101-ab-hitam',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Elektrik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '256.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-3.jpg'),
                'category' => 'Kompor Gas',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 A',
                'slug' => 'qgc-101-a',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Mekanik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '180.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
        ];
    }

    protected function getRegulatorProduct()
    {
        return [
            [
                'image' => asset('images/product-4.jpg'),
                'category' => 'Regulator',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRL-03',
                'slug' => 'qrl-03',
                'specs' => [
                    'power_type' => 'Kunci Tunggal',
                    'fuel_type' => 'Tekanan Rendah',
                ],
                'price' => '60.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-5.jpg'),
                'category' => 'Regulator',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRH-09',
                'slug' => 'qrh-09',
                'specs' => [
                    'power_type' => 'Kunci Tunggal',
                    'fuel_type' => 'Tekanan Rendah',
                ],
                'price' => '256.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-6.jpg'),
                'category' => 'Regulator dan Selang Gas',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRH-032',
                'slug' => 'qrh-032',
                'specs' => [
                    'length_type' => '1,8 Meter',
                    'fuel_type' => 'Tekanan Rendah',
                ],
                'price' => '180.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
        ];
    }

    protected function getSparepartProduct()
    {
        return [
            [
                'image' => asset('images/product-7.jpg'),
                'category' => 'Sparepart',
                'category_slug' => 'suku-cadang',
                'name' => 'Burner Kuningan',
                'slug' => 'burner-kuningan',
                'price' => '100.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-8.jpg'),
                'category' => 'Sparepart',
                'category_slug' => 'suku-cadang',
                'name' => 'Tatakan Kompor',
                'slug' => 'tatakan-kompor',
                'specs' => [
                    'furnace_type' => '5 Kaki',
                ],
                'price' => '50.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
        ];
    }

    public function mount()
    {
        $this->category = Route::current()->parameter('category');
    }

    public function render()
    {
        switch ($this->category) {
            case 'kompor':
                $products = $this->getStoveProduct();
                break;
            case 'regulator-dan-selang-gas':
                $products = $this->getRegulatorProduct();
                break;
            case 'suku-cadang':
                $products = $this->getSparepartProduct();
                break;
            default:
                $products = $this->getAllProduct();
                break;
        }

        return view('livewire.components.displays.product-list', [
            'products' => $products,
        ]);
    }
}
