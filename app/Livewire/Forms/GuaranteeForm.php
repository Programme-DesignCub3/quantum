<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class GuaranteeForm extends Component
{
    // Personal Data
    public $nama_lengkap;
    public $nomor_handphone;
    public $email;
    public $alamat_lengkap;

    // Product Data
    public $nomor_seri_produk;
    public $kategori_produk;
    public $model_produk;
    public $tanggal_pembelian;
    public $tempat_pembelian;
    public $pesan;

    public $tnc;

    public function submit()
    {
        $this->validate([
            'nama_lengkap' => 'required|max:255',
            'nomor_handphone' => 'required|max:20',
            'email' => 'required|email',
            'alamat_lengkap' => 'required',
            'nomor_seri_produk' => 'required',
            'kategori_produk' => 'required',
            'model_produk' => 'required',
            'tanggal_pembelian' => 'required|date',
            'tempat_pembelian' => 'required',
            'pesan' => 'required',
            'tnc' => 'accepted'
        ]);

        $this->reset();
    }

    #[On('purchase-date-selected')]
    public function setPurchaseDate($date)
    {
        $this->tanggal_pembelian = $date;
    }

    public function render()
    {
        return view('livewire.forms.guarantee-form');
    }
}
