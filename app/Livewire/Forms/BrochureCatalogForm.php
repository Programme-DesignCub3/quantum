<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class BrochureCatalogForm extends Component
{
    public $nama;
    public $email;
    public $whatsapp;
    public $tnc;

    public function submit()
    {
        $this->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|max:20',
            'tnc' => 'accepted',
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.forms.brochure-catalog-form');
    }
}
