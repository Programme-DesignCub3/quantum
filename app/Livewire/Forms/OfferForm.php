<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Component;

class OfferForm extends Component
{
    #[Validate('required|email')]
    public $email;

    public function submit()
    {
        $this->validate();

        dd("This only for test", $this->email);
    }

    public function render()
    {
        return view('livewire.forms.offer-form');
    }
}
