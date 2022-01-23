<?php

namespace App\View\Components;

use Illuminate\View\Component;

class adminHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $parent;
    public $pagename;
    public function __construct($parent='', $pagename='')
    {
        $this->parent = $parent;
        $this->pagename = $pagename;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        return view('components.admin-header');
        //return view('admin.addproductcategory');
    }
}
