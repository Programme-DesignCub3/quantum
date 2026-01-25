<?php

namespace App\Livewire\Displays;

use App\Models\ServiceCenter;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class ServiceCenterList extends Component
{
    #[Url(as: 'q', except: '')]
    public $search = '';

    public $amount = 3;

    #[On('change-tab')]
    public function changeTab()
    {
        $this->search = '';
        $this->amount = 3;
    }

    public function loadMore()
    {
        $this->amount += 3;
    }

    public function render(ServiceCenter $serviceCenter)
    {
        $total_count = $serviceCenter->getCountAllServiceCenter($this->search);
        $service_centers = $serviceCenter->getAllServiceCenter($this->amount, $this->search);

        return view('livewire.displays.service-center-list', [
            'total_count' => $total_count,
            'service_centers' => $service_centers,
        ]);
    }
}
