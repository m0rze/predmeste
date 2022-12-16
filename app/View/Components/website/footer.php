<?php

namespace App\View\Components\website;

use Illuminate\View\Component;

class footer extends Component
{
    private $mainData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mainData)
    {
        $this->mainData = $mainData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website.footer');
    }
}
