<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $mainName;
    public $mainUrl;
    public $subName;
    public $subUrl;
    public $sub2Name;
    public $sub2Url;
    public $btnTambah;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mainName,$mainUrl, $subName=null,$subUrl=null, $sub2Name=null,$sub2Url = null,$btnTambah=false)
    {
        $this->mainName = $mainName;
        $this->mainUrl = $mainUrl;
        $this->subName = $subName;
        $this->subUrl = $subUrl;
        $this->sub2Name = $sub2Name;
        $this->sub2Url = $sub2Url;
        $this->btnTambah = $btnTambah;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
