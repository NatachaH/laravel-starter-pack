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
     * Define the badge color by event name.
     *
     * @var string
     */
    public function color($event)
    {
        switch ($event) {
          case 'created':
            $color = 'success';
            break;
          case 'updated':
          case 'saved':
            $color = 'info';
            break;
          case 'deleted':
          case 'force-deleted':
            $color = 'danger';
            break;
          case 'soft-deleted':
            $color = 'warning';
            break;
          case 'restored':
            $color = 'primary';
            break;
          default:
            $color = 'gray';
            break;
        }
        return $color;
    }

    /**
     * Define the icon by event name.
     *
     * @var string
     */
    public function icon($event)
    {
        switch ($event){
          case 'created':
            $icon = 'plus';
            break;
          case 'updated':
          case 'saved':
            $icon = 'pencil';
            break;
          case 'deleted':
          case 'force-deleted':
          case 'soft-deleted':
            $icon = 'trash';
            break;
          case 'restored':
            $icon = 'time-reverse';
            break;
          default:
            $icon = 'rocket';
            break;
        }
        return $icon;
    }

    /**
     * Define the icon by event name.
     *
     * @var string
     */
    public function relationIcon($relation)
    {
        switch ($relation){
          case 'category':
            $icon = 'tag';
            break;
          case 'address':
            $icon = 'location';
            break;
          case 'status':
            $icon = 'flag';
            break;
          case 'media':
            $icon = 'image';
            break;
          default:
            $icon = 'rocket';
            break;
        }
        return $icon;
    }

    /**
     * Define the description by item and by type.
     *
     * @var string
     */
    public function description($item)
    {
        $model = \Lang::has('backend.model.'.$item->model) ? trans_choice('backend.model.'.$item->model,1) : Str::ucfirst($item->model);
        $user = !is_null($item->user) ? __('sp::listing.by', ['name' => $item->username]) : null;
        $route = Str::plural($item->model).'.show';

        // Define if model exist to display a link
        if($this->type !== 'model' && Route::has($route) && Auth::user()->can('view', $item->trackable))
        {
            $model = '<a href="'.route($route, $item->trackable_id).'">'.$model.'</a>';
        }

        switch ($this->type) {
          case 'user':
            $description = $model.' #'.$item->trackable_id;
            break;
          case 'model':
            $description = $user;
            break;
          default:
            $description = '<b>'.$model.' #'.$item->trackable_id.'</b> '.$user;
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
