<?php

namespace App\Livewire\Forms;

use App\Models\Product\ProductCategory;
use App\Models\RegisterGuarantee;
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

    public $product_categories = [];
    public $tnc;

    public function mount(ProductCategory $productCategory)
    {
        $this->product_categories = $productCategory->getAllCategory();
    }

    public function rules()
    {
        return [
            'nama_lengkap' => 'required|max:255',
            'nomor_handphone' => 'required|max:20|phone:INTERNATIONAL,ID',
            'email' => 'required|email',
            'alamat_lengkap' => 'required',
            'nomor_seri_produk' => 'required',
            'kategori_produk' => 'required',
            'model_produk' => 'required',
            'tanggal_pembelian' => 'required|date',
            'tempat_pembelian' => 'required',
            'pesan' => 'required',
            'tnc' => 'accepted'
        ];
    }

    public function submit()
    {
        $this->validate();

        RegisterGuarantee::create([
            'name' => $this->nama_lengkap,
            'phone' => $this->nomor_handphone,
            'email' => $this->email,
            'address' => $this->alamat_lengkap,
            'product_serial_number' => $this->nomor_seri_produk,
            'product_category' => $this->kategori_produk,
            'product_model' => $this->model_produk,
            'purchase_date' => $this->tanggal_pembelian,
            'purchase_place' => $this->tempat_pembelian,
            'message' => $this->pesan,
        ]);

        $this->reset([
            'nama_lengkap',
            'nomor_handphone',
            'email',
            'alamat_lengkap',
            'nomor_seri_produk',
            'kategori_produk',
            'model_produk',
            'tanggal_pembelian',
            'tempat_pembelian',
            'pesan',
            'tnc'
        ]);

        session()->put('guarantee_registered', true);
        return redirect()->route('support.guarantee-information.registration-success');
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
