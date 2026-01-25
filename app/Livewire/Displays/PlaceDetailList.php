<?php

namespace App\Livewire\Displays;

use Livewire\Component;

class PlaceDetailList extends Component
{
    public $place_id;

    public function render()
    {
        return view('livewire.displays.place-detail-list');
    }
}
