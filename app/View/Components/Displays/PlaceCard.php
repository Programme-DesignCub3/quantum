<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Propaganistas\LaravelPhone\PhoneNumber;

class PlaceCard extends Component
{
    // Props

    // PAYLOAD = data from controller
    // FOR = 'distributor' | 'service_center' (default: 'distributor')

    public $data_drawer;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $payload,
        public ?string $for = 'distributor',
    ) {
        $phone = new PhoneNumber($this->payload->phone, 'ID');
        $whatsapp = new PhoneNumber($this->payload->whatsapp, 'ID');

        $this->payload->phone_formatted = $phone->formatE164();
        $this->payload->whatsapp_formatted = $whatsapp->formatE164();

        if($this->for === 'service_center') {
            $this->data_drawer = [
                'for' => $this->for,
                'image' => $this->payload->getFirstMedia('service_centers') ? $this->payload->getFirstMedia('service_centers')->getUrl() : null,
                'area' => $this->payload->area,
                'name' => $this->payload->name,
                'address' => $this->payload->address,
                'operational' => $this->payload->operational,
                'provide_service' => $this->payload->provide_service,
                'provide_sell' => $this->payload->provide_sell,
                'phone' => $this->payload->phone_formatted,
                'whatsapp' => $this->payload->whatsapp_formatted,
                'maps' => $this->payload->maps,
            ];
        } else if($this->for === 'distributor') {
            $this->data_drawer = [
                'for' => $this->for,
                'image' => $this->payload->getFirstMedia('distributors') ? $this->payload->getFirstMedia('distributors')->getUrl() : null,
                'area' => 'Distributor ' . $this->payload->area->area,
                'name' => $this->payload->name,
                'address' => $this->payload->address,
                'operational' => $this->payload->operational,
                'provide' => $this->payload->provide,
                'phone' => $this->payload->phone_formatted,
                'whatsapp' => $this->payload->whatsapp_formatted,
                'maps' => $this->payload->maps,
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.place-card');
    }
}
