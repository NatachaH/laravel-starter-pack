<?php

namespace Sp\View\Components;

use Illuminate\View\Component;

class Search extends Component
{
    /**
     * The action of the form.
     *
     * @var string
     */
    public $action;

    /**
     * The reset url.
     *
     * @var string
     */
    public $reset;

    /**
     * Is the form have an advanced search bloc.
     *
     * @var boolean
     */
    public $isAdvanced;

    /**
     * Check if the search have some datas.
     *
     * @var boolean
     */
    public function hasSearchData(){
        return request()->has('search');
    }

    /**
     * The id of the collapse bloc (by default: collapseSearch).
     *
     * @var string
     */
    public $collapseId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $isAdvanced = false, $collapseId = 'collapseSearch')
    {
        $this->action     = '#';
        $this->reset      = '#';
        $this->isAdvanced = $isAdvanced;
        $this->collapseId = $collapseId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.search');
    }
}
