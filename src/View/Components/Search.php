<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Arr;

class Search extends Component
{

    /**
     * The session key of the Search.
     *
     * @var string
     */
    public $key;

    /**
     * Base route for action and views.
     *
     * @var string
     */
    public $route;

    /**
     * Path of the folder
     *
     * @var string
     */
    public $folder;

    /**
     * Is the form have an advanced search bloc.
     *
     * @var boolean
     */
    public $isAdvanced;

    /**
     * The id of the collapse bloc.
     * By default: collapseSearch.
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
     * Check if the advanced search bloc is open.
     * @return boolean
     */
    public function isAdvancedOpen()
    {
        if(!is_null($this->search))
        {
            $attributes = Arr::except($this->search->attributes, ['text']);
            return count($attributes) > 0 ? true : false;
        } else {
            return false;
        }
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key, $route, $folder = '', $isAdvanced = false, $collapseId = 'collapseSearch')
    {
        $this->key            = $key;
        $this->route          = $route;
        $this->folder         = empty($folder) ? $route : $folder;
        $this->isAdvanced     = $isAdvanced;
        $this->collapseId     = $collapseId;
        $this->search         = session()->exists('search.'.$this->key) ? session('search.'.$this->key) : null;
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
