<?php

namespace App\Livewire\Forms;

use App\Models\Recipe\PremiumMember;
use Livewire\Component;

class RecipePremiumForm extends Component
{
    public $nama;
    public $email;
    public $whatsapp;
    public $tnc;

    public $payload;
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

    public function mount($payload)
    {
        $this->payload = $payload;
    }

    public function submitDownload()
    {
        $this->validate();

        $check_existing = PremiumMember::where('email', $this->email)->exists();

        if(!$check_existing) {
            PremiumMember::create([
                'name' => $this->nama,
                'email' => $this->email,
                'whatsapp' => $this->whatsapp,
            ]);
        }

        $this->reset(['nama', 'email', 'whatsapp', 'tnc']);
        $this->dispatch('open-limit');
        $this->status = true;
        session()->put('registered_premium', true);

        $media = $this->payload->getFirstMedia('recipe-files');
        $file_path = $media->getPath();

        if(file_exists($file_path)) {
            $file_name = 'Resep - ' . $this->payload->title . '.' . $media->extension;

            return response()->download($file_path, $file_name);
        }
    }

    public function submitView()
    {
        $this->validate();

        $check_existing = PremiumMember::where('email', $this->email)->exists();

        if(!$check_existing) {
            PremiumMember::create([
                'name' => $this->nama,
                'email' => $this->email,
                'whatsapp' => $this->whatsapp,
            ]);
        }

        $this->reset(['nama', 'email', 'whatsapp', 'tnc']);
        $this->dispatch('open-limit');
        session()->put('registered_premium', true);
    }

    public function render()
    {
        return view('livewire.forms.recipe-premium-form');
    }
}
