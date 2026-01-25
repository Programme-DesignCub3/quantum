<?php

namespace App\Livewire\Displays;

use App\Models\ServiceCenter;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class ServicePartnerList extends Component
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
        $total_count = $serviceCenter->getCountAllServicePartner($this->search);
        $service_partners = $serviceCenter->getAllServicePartner($this->amount, $this->search);

        return view('livewire.displays.service-partner-list', [
            'total_count' => $total_count,
            'service_partners' => $service_partners,
        ]);
    }
}
