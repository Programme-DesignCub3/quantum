<?php

namespace App\Livewire\Displays;

use App\Models\Distributor\AreaDistributor;
use App\Models\Distributor\Distributor;
use App\Settings\PageSettings;
use Livewire\Attributes\Url;
use Livewire\Component;

class DistributorList extends Component
{
    #[Url(as: 'provinsi', except: '')]
    public $province = '';

    public $areas;
    public $amount = 3;

    public function mount(AreaDistributor $areaDistributor)
    {
        $this->areas = $areaDistributor->getAllArea();
    }

    public function loadMore()
    {
        $this->amount += 3;
    }

    public function areaFilter($province)
    {
        $this->amount = 3;
        $this->province = $province;
    }

    public function render(PageSettings $pageSettings, Distributor $distributor)
    {
        $total_count = $distributor->getCountAllDistributor($this->province);
        $distributors = $distributor->getAllDistributor($this->amount, $this->province);

        return view('livewire.displays.distributor-list', [
            'page_settings' => $pageSettings,
            'total_count' => $total_count,
            'distributors' => $distributors,
        ]);
    }
}
