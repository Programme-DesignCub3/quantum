<?php

namespace App\Livewire\Components\Displays;

use Livewire\Attributes\On;
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
                'name' => 'QGC - 101 AB Putih',
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
                'name' => 'QGC - 101 AB Hitam',
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
                'name' => 'QGC - 101 A',
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
                'name' => 'QRL-03',
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
                'name' => 'QRH-09',
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
                'category' => 'Selang dan Regulator Gas',
                'name' => 'QRH-032',
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
                'name' => 'Burner Kuningan',
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
                'name' => 'Tatakan Kompor',
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
                'name' => 'QGC - 101 AB Putih',
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
                'name' => 'QGC - 101 AB Hitam',
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
                'name' => 'QGC - 101 A',
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
                'name' => 'QRL-03',
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
                'name' => 'QRH-09',
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
                'category' => 'Selang dan Regulator Gas',
                'name' => 'QRH-032',
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
                'name' => 'Burner Kuningan',
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
                'name' => 'Tatakan Kompor',
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

    public function mount($category)
    {
        $this->category = $category;
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
