<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Auth;


class History extends Component
{

    /**
     * The title of the history.
     *
     * @var string
     */
    public $title;

    /**
     * Type of History
     * Global, Model, User
     *
     * @var string
     */
    public $type;

    /**
     * The track list.
     *
     * @var Illuminate\Database\Eloquent\Collection
     */
    public $items;

    /**
     * Define the description by item and by type.
     *
     * @var string
     */
    public function description($item)
    {
        // Define the translated model name
        $model    = $item->model_name;

        // Define the route for display the model
        $route    = 'backend.'.Str::plural($item->model).'.show';

        // Get the title of the model
        $title    = $item->trackable->title ?? $item->trackable->name ?? $item->trackable_id;

        // Check if there is a link to the model
        $hasLink  = Route::has($route) && Auth::user()->can('view', $item->trackable);

        // Define how to display the item
        $item     = $hasLink ? '<a href="'.route($route, $item->trackable_id).'">'.$title.'</a>' : $title;

        switch ($this->type) {
          case 'model':
            $description = '<b>'.$item->event_name.'</b>';
            break;
          case 'user':
            $description = '<b>'.$model.':</b>'.$item;
            break;
          default:
            $description = '<b>'.$model.':</b>'.$item;
            break;
        }

        return Str::ucfirst($description);
    }


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $type = 'global', $items = null)
    {
        $this->title      = is_null($title) ? __('sp::field.history') : $title;
        $this->type       = in_array($type,['global','model','user']) ? $type : 'global';
        $this->items      = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.history');
    }
}
