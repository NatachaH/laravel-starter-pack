<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;

class Search extends Component
{

    /**
     * The session key of the Search.
     *
     * @var string
     */
    public $key;

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
     * The id of the collapse bloc (by default: collapseSearch).
     *
     * @var string
     */
    public $collapseId;

    /**
     * The session Search.
     *
     * @var Nh\Searchable\Search
     */
    public $search;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key, $action, $isAdvanced = false, $collapseId = 'collapseSearch')
    {
        $this->key        = $key;
        $this->action     = $action;
        $this->isAdvanced = $isAdvanced;
        $this->collapseId = $collapseId;
        $this->search     = session()->exists($this->key) ? session($this->key) : null;
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
