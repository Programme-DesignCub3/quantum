<?php

namespace App\Livewire\Displays;

use App\Models\ServiceCenter\ServiceCenter;
use App\Models\ServiceCenter\TypeService;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class ServiceCenterList extends Component
{
    public $type_services;
    public $type_service_name;
    public $current_tab;

    #[Url(as: 'q', except: '')]
    public $search = '';

    public function mount(TypeService $typeService)
    {
        $this->type_services = $typeService->getAllTypeService();
        $this->type_service_name = $this->type_services->first()->name ?? null;
        $this->current_tab = $this->type_services->first()->slug ?? null;
    }

    #[On('change-tab')]
    public function changeTab($name, $slug)
    {
        $this->type_service_name = $name;
        $this->current_tab = $slug;
        $this->search = '';
    }

    public function render(ServiceCenter $serviceCenter)
    {
        $get_service = $serviceCenter->getAllServiceCenter($this->search, $this->current_tab);
        $service_centers = $get_service->groupBy('areaService.area')->sortBy(function($group) {
            return $group->first()->areaService->area;
        });

        return view('livewire.displays.service-center-list', [
            'service_centers' => $service_centers,
        ]);
    }
}
