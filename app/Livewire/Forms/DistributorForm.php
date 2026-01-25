<?php

namespace App\Livewire\Forms;

use App\Models\Distributor\RegisterDistributor;
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

    public $status = false;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|max:20|phone:INTERNATIONAL,ID',
            'wilayah_distribusi' => 'required',
            'alamat_lengkap' => 'required',
            'pesan' => 'required',
            'tnc' => 'accepted'
        ];
    }

    public function submit()
    {
        $this->validate();

        RegisterDistributor::create([
            'name' => $this->nama,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'distributed_area' => $this->wilayah_distribusi,
            'address' => $this->alamat_lengkap,
            'message' => $this->pesan,
        ]);

        $this->reset(['nama', 'email', 'whatsapp', 'wilayah_distribusi', 'alamat_lengkap', 'pesan', 'tnc']);
        $this->status = true;
    }

    public function render(PageSettings $pageSettings)
    {
        return view('livewire.forms.distributor-form', [
            'page_settings' => $pageSettings,
        ]);
    }
}
