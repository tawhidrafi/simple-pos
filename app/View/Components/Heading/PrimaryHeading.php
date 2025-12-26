<?php

namespace App\View\Components\Heading;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrimaryHeading extends Component
{
    public $heading;

    public function __construct($heading)
    {
        $this->heading = $heading;
    }

    public function render(): View|Closure|string
    {
        return view('components.heading.primary-heading');
    }
}
