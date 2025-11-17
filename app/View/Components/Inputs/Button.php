<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use VARIANT;

class Button extends Component
{
    // Props

    // TYPE = 'button' | 'submit' | hyperlink (default: 'button')
    // SIZE = 'lg' | 'md' | 'sm' | 'xs' (default: 'md')
    // VARIANT = 'primary' | 'secondary' (default: 'primary')
    // COLOR = 'white' | 'dark' (default: 'dark')
    // DISABLED = true | false (default: false)
    // HREF = null (for hyperlink type only)
    // CLASS = additional classes
    // EVENT = event to trigger

    public string $sizeClass = '';
    public string $variantClass = '';
    public string $colorClass = '';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $type = 'button',
        public ?string $variant = 'primary',
        public ?string $size = 'md',
        public ?string $color = 'dark',
        public ?bool $disabled = false,
        public ?string $href,
        public ?string $class,
        public ?string $event,
    ) {
        // Set size class
        switch($this->size) {
            case 'lg':
                $this->sizeClass = 'py-4 px-8 rounded-2xl font-semibold tracking-[0.5px] leading-[125%]';
                break;
            case 'md':
                $this->sizeClass = 'py-3 px-6 rounded-xl font-semibold tracking-[0.5px] leading-[114%] text-sm';
                break;
            case 'sm':
                $this->sizeClass = 'py-[10px] px-5 rounded-lg font-semibold tracking-[0.5px] leading-[133%] text-xs';
                break;
            case 'xs':
                $this->sizeClass = 'py-2 px-4 rounded-lg font-medium tracking-[0.6px] leading-[120%] text-[11px]';
                break;
            default:
                $this->sizeClass = 'py-3 px-6 rounded-xl font-semibold tracking-[0.5px] leading-[114%] text-sm';
        }

        // Set variant class
        switch($this->variant) {
            case 'primary':
                $this->variantClass = 'border-transparent';
                break;
            case 'secondary':
                $this->variantClass = 'border-[#B6D5D8] hover:border-[#B6D5D8]/0 hover:bg-qt-green-hover disabled:border-[#E9E9E9] disabled:text-[#C7C7C7]';
                break;
            default:
                $this->variantClass = 'border-transparent';
        }

        // Set color class
        switch($this->color) {
            case 'white':
                if ($this->variant === 'secondary') {
                    $this->colorClass = 'bg-transparent text-qt-green-normal hover:text-white hover:bg-qt-green-hover disabled:bg-transparent';
                    break;
                }
                $this->colorClass = 'bg-white text-qt-green-normal hover:bg-qt-green-normal hover:text-white disabled:bg-[#F4F4F4] disabled:text-[#DBDBDB]';
                break;
            case 'dark':
                if ($this->variant === 'secondary') {
                    $this->colorClass = 'bg-transparent text-qt-green-normal hover:text-white hover:bg-qt-green-hover disabled:bg-transparent';
                    break;
                }
                $this->colorClass = 'bg-qt-green-normal text-white hover:bg-qt-green-hover disabled:bg-[#E9E9E9] disabled:text-[#C7C7C7]';
                break;
            default:
                $this->colorClass = 'bg-qt-green-normal text-white hover:bg-qt-green-hover disabled:bg-[#F4F4F4] disabled:text-[#DBDBDB]';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.button');
    }
}
