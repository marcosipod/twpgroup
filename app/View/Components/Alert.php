<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    public $type;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    public $message;
   
    /**
     * Undocumented function
     *
     * @param [type] $type
     * @param [type] $message
     */
    public function __construct(string $type = 'info', $message = [])
    {
        $this->type   = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
