<?php

namespace App\Livewire\Displays;

use App\Models\Guidance;
use Livewire\Component;

class GuidanceList extends Component
{
    public $amount = 3;

    public function loadMore()
    {
        $this->amount += 3;
    }

    public function render(Guidance $guidance)
    {
        $total_count = $guidance->getCountAllGuidance() - 1;
        $latest = $guidance->getAllGuidance(1);
        $guidances = $guidance->getAllGuidance($this->amount, 1);

        return view('livewire.displays.guidance-list', [
            'latest' => $latest,
            'guidances' => $guidances,
            'total_count' => $total_count,
        ]);
    }
}
