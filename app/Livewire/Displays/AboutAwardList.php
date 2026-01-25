<?php

namespace App\Livewire\Displays;

use App\Settings\PageSettings;
use Livewire\Component;

class AboutAwardList extends Component
{
    public $year = '';

    public function mount(PageSettings $pageSettings)
    {
        if (!empty($pageSettings->about_award)) {
            $this->year = $pageSettings->about_award[0]['year'];
        }
    }

    public function awardsFilter($year)
    {
        $this->year = $year;
        $this->dispatch('awards-about-reinit');
    }

    public function render(PageSettings $pageSettings)
    {
        return view('livewire.displays.about-award-list', [
            'page_settings' => $pageSettings,
        ]);
    }
}
