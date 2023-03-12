<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Checkbox extends Component
{   
    public $id;
    public $class;
    public $name;
    public $value;
    public $checked;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $class = '', $name = '', $value = null, $checked = false)
    {
        $this->id = $id;
        $this->class = $class;
        $this->name = $name;
        $this->value = $value;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.checkbox');
    }
}
