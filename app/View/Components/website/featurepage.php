<?php

namespace App\View\Components\website;

use Illuminate\View\Component;

class featurepage extends Component
{

    public $featurePage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($featurePage)
    {

        $this->featurePage = $featurePage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website.featurepage');
    }
}
