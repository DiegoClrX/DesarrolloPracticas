<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Profile extends Component
{
    public $title;
    public $info;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
        //$this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.profile');
    }
}
