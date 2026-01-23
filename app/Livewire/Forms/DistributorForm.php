<?php

namespace App\Livewire\Forms;

use App\Settings\PageSettings;
use Livewire\Component;

class DistributorForm extends Component
{
    public $nama;
    public $email;
    public $whatsapp;
    public $wilayah_distribusi;
    public $alamat_lengkap;
    public $pesan;
    public $tnc;

    public function submit()
    {
        $this->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|max:20',
            'wilayah_distribusi' => 'required',
            'alamat_lengkap' => 'required',
            'pesan' => 'required',
            'tnc' => 'accepted'
        ]);

        $this->reset();
    }

    public function render(PageSettings $pageSettings)
    {
        return view('livewire.forms.distributor-form', [
            'page_settings' => $pageSettings,
        ]);
    }
}
