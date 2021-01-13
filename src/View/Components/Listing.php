<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;

use Auth;
use Route;

class Listing extends Component
{

    /**
     * The array of items.
     *
     * @var Illuminate\Database\Eloquent\Collection
     */
    public $items;

    /**
     * The array of the table header columns.
     *
     * @var array
     */
    public $header;

    /**
     * The model of the items.
     * This is used for action authorizations.
     *
     * @var string
     */
    public $model;

    /**
     * The route of the items.
     * This is used for action buttons.
     *
     * @var string
     */
    public $route;

    /**
     * Display the default ID column.
     *
     * @var boolean
     */
    public $showId;

    /**
     * Display the default dates column.
     *
     * @var boolean
     */
    public $showDates;

    /**
     * Path of the folder
     *
     * @var string
     */
    public $folder;

    /**
     * Total nbr of item
     *
     * @var array
     */
    public $total;

    /**
     * Enable the sortable.
     *
     * @var boolean
     */
    public $sortable;

    /**
     * The sortable order
     *
     * @var string
     */
    public $sortableOrder;

    /**
     * Check if the items are paginate.
     * @return boolean
     */
    public function hasPagination()
    {
        return $this->items instanceof \Illuminate\Pagination\LengthAwarePaginator;
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
     * Check if the model has has Sortable method.
     * @return boolean
     */
    public function isSortable()
    {
        return $this->sortable && in_array('Nh\Sortable\Traits\Sortable', class_uses($this->model));
    }

    /**
     * Check if the current route is search.
     * @return boolean
     */
    public function isSearch()
    {
        return Route::is($this->route.'.search');
    }

    /**
     * Display the default deleted_at column.
     *
     * @var boolean
     */
    public function showDeletedDates()
    {
        return $this->hasSoftDelete() && Route::is([$this->route.'.trashed',$this->route.'.search']);
    }

    /**
     * Get total number element that are (not) in trash.
     * @return array
     */
    private function defineTotal()
    {
        $model = new $this->model;
        $total['all'] = $model->count();

        if($this->hasSoftDelete())
        {
            $total['trash'] = $model->onlyTrashed()->count();
        }

        return $total;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $route, $header, $items, $showId = false, $showDates = false, $folder = null, $sortable = false, $sortableOrder = 'asc')
    {
        $this->model      = $model;
        $this->route      = $route;
        $this->header     = explode('|', $header);
        $this->items      = $items;
        $this->showId     = $showId;
        $this->showDates  = $showDates;
        $this->folder     = empty($folder) ? $route : $folder;
        $this->total      = $this->defineTotal();
        $this->sortable   = $sortable;
        $this->sortableOrder  = $sortableOrder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.listing');
    }
}
