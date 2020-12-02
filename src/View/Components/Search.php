<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Arr;

use Auth;

class Search extends Component
{

    /**
     * The session key of the Search.
     *
     * @var string
     */
    public $key;

    /**
     * The model class.
     *
     * @var string
     */
    public $model;

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
     * Is the form have a sortable search option.
     *
     * @var boolean
     */
    public $isSortable;

    /**
     * Sortable fields options.
     *
     * @var array
     */
    public $sortableFields;

    /**
     * The id of the collapse bloc.
     * By default: collapseSearch.
     *
     * @var string
     */
    public $collapseId;

    /**
     * The id of the collapse bloc.
     * By default: collapseSearchFilter.
     *
     * @var string
     */
    public $collapseFilterId;

    /**
     * The id of the collapse bloc.
     * By default: collapseSearchSort.
     *
     * @var string
     */
    public $collapseSortId;

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
            $attributes = Arr::except($this->search->attributes, ['text','sort']);
            return count($attributes) > 0 ? true : false;
        } else {
            return false;
        }
    }

    /**
     * Check if the sortable search bloc is open.
     * @return boolean
     */
    public function isSortableOpen()
    {
        if(!is_null($this->search))
        {
            $attributes = Arr::only($this->search->attributes, ['sort']);
            return count($attributes) > 0 && ($attributes['sort']['field'] != array_key_first($this->sortableFields) || $attributes['sort']['direction'] != 'asc') ? true : false;
        } else {
            return false;
        }
    }

    /**
     * Define the array of options for the sortable select.
     * @return array
     */
    private function defineSortableFields($values)
    {
        $fields = [];

        if(!empty($values))
        {
          $array = explode('|', $values);

          foreach ($array as $value) {
            $fields[$value] = (\Lang::has('sp::field.'.$value) ? __('sp::field.'.$value) : (\Lang::has('backend.field.'.$value) ? __('backend.field.'.$value) : $value));
          }
        }

        return $fields;
    }

    /**
     * Check if the model has Soft Deleting method and that the Auth user can see the trashed items.
     * @return boolean
     */
    public function hasSoftDelete()
    {
        return in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this->model)) && Auth::user()->can('viewTrashed', $this->model);
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key, $model, $route, $folder = null, $isAdvanced = false, $isSortable = false, $sortableFields = [], $collapseId = 'collapseSearch')
    {
        $this->key              = $key;
        $this->model            = $model;
        $this->route            = $route;
        $this->folder           = empty($folder) ? $route : $folder;
        $this->isAdvanced       = $isAdvanced;
        $this->sortableFields   = $this->defineSortableFields($sortableFields);
        $this->isSortable       = $isSortable && !empty($this->sortableFields);
        $this->collapseId       = $collapseId;
        $this->collapseFilterId = $collapseId.'Filter';
        $this->collapseSortId   = $collapseId.'Sort';
        $this->search           = session()->exists('search.'.$this->key) ? session('search.'.$this->key) : null;
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
