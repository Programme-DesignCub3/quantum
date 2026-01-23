<?php

namespace App\Livewire\Forms;

use App\Models\CatalogDownload;
use App\Models\Product\Product;
use Livewire\Component;

class CatalogForm extends Component
{
    public $nama;
    public $email;
    public $whatsapp;
    public $catalog_id;
    public $tnc;

    public $status = false;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|max:20|phone:INTERNATIONAL,ID',
            'tnc' => 'accepted',
        ];
    }

    public function submit()
    {
        $this->validate();

        $check_existing = CatalogDownload::where('email', $this->email)->exists();

        $get_catalog = Product::where('id', $this->catalog_id)->first();
        $name_catalog = $get_catalog->variant->name . ' ' .  $get_catalog->name;

        if(!$check_existing) {
            $downloaded_catalogs = [$name_catalog];

            CatalogDownload::create([
                'name' => $this->nama,
                'email' => $this->email,
                'whatsapp' => $this->whatsapp,
                'downloaded_catalogs' => $downloaded_catalogs,
            ]);
        } else {
            $existing_entry = CatalogDownload::where('email', $this->email)->first();
            $existing_catalogs = $existing_entry->downloaded_catalogs;

            if(!in_array($name_catalog, $existing_catalogs)) {
                $existing_catalogs[] = $name_catalog;
            }

            $existing_entry->update([
                'downloaded_catalogs' => $existing_catalogs,
            ]);
        }

        $this->reset(['nama', 'email', 'whatsapp', 'tnc', 'catalog_id']);
        $this->dispatch('close-catalog-drawer');
        $this->status = true;

        $media = $get_catalog->getFirstMedia('catalog_product');
        $file_path = $media->getPath();

        if(file_exists($file_path)) {
            $file_name = 'Katalog - ' . $get_catalog->variant->name . ' ' . $get_catalog->name . '.' . $get_catalog->getFirstMedia('catalog_product')->extension;

            return response()->download($file_path, $file_name);
        }
    }

    public function render()
    {
        return view('livewire.forms.catalog-form');
    }
}
