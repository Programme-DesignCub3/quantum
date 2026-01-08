<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class RecipePremiumForm extends Component
{
    public $nama;
    public $email;
    public $whatsapp;
    public $tnc;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|max:20',
            'tnc' => 'accepted',
        ];
    }

    public function submitDownload()
    {
        $this->validate();
        $this->reset();

        session()->put('registered_premium', true);
        $this->dispatch('open-limit');
    }

    public function submitView()
    {
        $this->validate();
        $this->reset();

        session()->put('registered_premium', true);
        $this->dispatch('open-limit');
    }

    public function render()
    {
        return view('livewire.forms.recipe-premium-form');
    }
}
