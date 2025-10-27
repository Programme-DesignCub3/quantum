<?php

namespace App\Livewire\Components\Inputs;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class TextField extends Component
{
    #[Modelable]
    public $value;

    public string $colorClass;

    public string $label, $id, $type, $error, $placeholder, $color, $required, $showLabel;

    public function mount(
        string $label,
        string $id,
        string $type,
        string $error,
        string $placeholder,
        ?string $color = 'default',
        bool $required = false,
        bool $showLabel = true
    ) {
        $this->label = $label;
        $this->id = $id;
        $this->type = $type;
        $this->error = $error;
        $this->placeholder = $placeholder;
        $this->color = $color;
        $this->required = $required;
        $this->showLabel = $showLabel;

        switch($this->color) {
            case 'green':
                $this->colorClass = 'border-[#92C0C5] text-white placeholder:text-[#92C0C5] focus:outline-[#92C0C5]/40';
                break;
            default:
                $this->colorClass = 'border-[#E9E9E9] text-[#6D6D6D]';
        }
    }

    public function render()
    {
        return view('livewire.components.inputs.text-field');
    }
}
