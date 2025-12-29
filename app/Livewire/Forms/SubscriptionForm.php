<?php

namespace App\Livewire\Forms;

use App\Models\Subscription;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SubscriptionForm extends Component
{
    #[Validate('required|email|unique:subscriptions,email')]
    public $email;

    public function submit()
    {
        $this->validate();

        Subscription::create([
            'email' => $this->email,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.forms.subscription-form');
    }
}
