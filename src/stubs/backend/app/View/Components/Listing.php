<?php

namespace App\View\Components;

use Illuminate\View\Component;

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
     * Must be a string with pipe separator.
     *
     * @var string
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
     * The view folder of the items.
     * This is used for customize the listing <td></td>.
     * By default it's the model in lowercase (ex: user/listing/detail.blade.php).
     *
     * @var string
     */
    public $view;

    /**
     * Check if the items have pagination.
     * @return boolean
     */
    public function hasPagination()
    {
        return $this->items instanceof \Illuminate\Pagination\LengthAwarePaginator;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $model, $route, $header, $items, $showId = false, $showDates = false)
    {
        $this->title      = $title;
        $this->model      = 'App\\'.$model;
        $this->route      = $route;
        $this->header     = explode('|', $header);
        $this->items      = $items;
        $this->showId     = $showId;
        $this->showDates  = $showDates;
        $this->view       = strtolower($model);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('backend.components.listing');
    }
}
