<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonIcon extends Component
{
    // Props

    // TYPE = 'button' | 'submit' | hyperlink (default: 'button')
    // SIZE = 'lg' | 'md' | 'sm' | 'xs' (default: 'md')
    // HOVER_COLOR = 'white' | 'dark' (default: 'dark')
    // DISABLED = true | false (default: false)
    // HREF = null (for hyperlink type only)
    // CLASS = additional classes
    // ICON = icon class name
    // IMAGE = image as icon

    public string $sizeClass = '';
    public string $iconClass = '';
    public string $hoverColorClass = '';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $type = 'button',
        public ?string $size = 'md',
        public ?string $hoverColor = 'dark',
        public ?bool $disabled = false,
        public ?string $href,
        public ?string $class,
        public ?string $icon
    ) {
        // Set size class
        switch($this->size) {
            case 'lg':
                $this->sizeClass = 'rounded-2xl font-semibold tracking-[0.5px] leading-[125%]';
                $this->iconClass = 'text-3xl';
                break;
            case 'md':
                $this->sizeClass = 'rounded-xl font-semibold tracking-[0.5px] leading-[114%] text-sm';
                $this->iconClass = 'text-2xl';
                break;
            case 'sm':
                $this->sizeClass = 'rounded-lg font-semibold tracking-[0.5px] leading-[133%] text-xs';
                $this->iconClass = 'text-xl';
                break;
            case 'xs':
                $this->sizeClass = 'rounded-lg font-medium tracking-[0.6px] leading-[120%] text-[11px]';
                $this->iconClass = 'text-lg';
                break;
            default:
                $this->sizeClass = 'rounded-xl font-semibold tracking-[0.5px] leading-[114%] text-sm';
                $this->iconClass = 'text-2xl';
        }

        // Set hover color class
        switch($this->hoverColor) {
            case 'white':
                $this->hoverColorClass = 'hover:border-transparent hover:bg-[#E7F1F2]';
                break;
            case 'dark':
                $this->hoverColorClass = 'hover:bg-qt-green-normal hover:text-white hover:border-transparent';
                break;
            default:
                $this->hoverColorClass = 'hover:bg-qt-green-normal hover:text-white hover:border-transparent';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.button-icon');
    }
}
