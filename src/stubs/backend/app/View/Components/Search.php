<?php

namespace App\View\Components;

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
      return false;
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
    public function __construct($action, $isAdvanced = false, $collapseId = 'collapseSearch')
    {
        $this->action = $action;
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
        return view('backend.components.search');
    }
}
