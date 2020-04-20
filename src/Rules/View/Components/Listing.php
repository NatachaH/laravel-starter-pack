<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;

use Auth;

class Listing extends Component
{
    /**
     * The title of the bloc.
     *
     * @var string
     */
    public $title;

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
     * The array of the table header columns.
     *
     * @var array
     */
    public $header;

    /**
     * The array of items (Laravel Collection).
     *
     * @var array
     */
    public $items;

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
     * Check if the items have pagination.
     * @return boolean
     */
    public function hasPagination()
    {
        return $this->items instanceof \Illuminate\Pagination\LengthAwarePaginator;
    }

    /**
     * Check if the model has Soft Deleting methods and that the Auth user can see the trashed items.
     * @return boolean
     */
    public function isSoftDeleting()
    {
        return in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this->model)) && Auth::user()->can('viewTrashed', $this->model);
    }

    /**
     * Get total number element that are (not) in trash.
     * @return array
     */
    public function total()
    {
        if($this->isSoftDeleting())
        {
            $model = new $this->model;

            $total['all'] = $model->count();
            $total['trash'] = $model->onlyTrashed()->count();

            return $total;
        }
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $model, $route, $header, $items, $showId = false, $showDates = false, $folder = '')
    {
        $this->title      = $title;
        $this->model      = $model;
        $this->route      = $route;
        $this->header     = explode('|', $header);
        $this->items      = $items;
        $this->showId     = $showId;
        $this->showDates  = $showDates;
        $this->folder     = empty($folder) ? $route : $folder;
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
