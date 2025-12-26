<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrimaryInput extends Component
{
    public $label;
    public $name;
    public $value;
    public $type;
    public $placeholder;

    public function __construct($label, $name, $value = null, $type = 'text', $placeholder = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value ?? old($name);
        $this->type = $type;
        $this->placeholder = $placeholder;
    }

    public function render(): View|Closure|string
    {
        return view('components.form.primary-input');
    }
}
