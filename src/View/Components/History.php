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
        return config('history.events.'.$event.'.color') ?? 'gray';
    }

    /**
     * Define the icon by event name.
     *
     * @var string
     */
    public function icon($event)
    {
        return config('history.events.'.$event.'.icon') ?? 'rocket';
    }

    /**
     * Define the icon by event name.
     *
     * @var string
     */
    public function relationIcon($relation)
    {
        return config('history.relations.'.$relation.'.icon') ?? 'rocket';
    }

    /**
     * Define the author and the time.
     *
     * @var string
     */
    public function authorAndTime($item)
    {
        $user =  __('sp::listing.by', ['name' => !is_null($item->user) ? $item->username : config('app.name')]);
        $time = $item->time;

        switch ($this->type) {
          case 'user':
            $description = $time;
            break;
          default:
            $description = $user.' '.$time;
            break;
        }

        return Str::ucfirst($description);
    }

    /**
     * Define the description by item and by type.
     *
     * @var string
     */
    public function description($item)
    {
        $model = \Lang::has('backend.model.'.$item->model) ? trans_choice('backend.model.'.$item->model,1) : Str::ucfirst($item->model);
        $route = 'backend.'.Str::plural($item->model).'.show';
        $name = $item->trackable->title ?? $item->trackable->name ?? $item->trackable_id;
        $link = '';

        // Define if model exist to display a link
        if($this->type !== 'model' && Route::has($route) && Auth::user()->can('view', $item->trackable))
        {
            $model = $model.':';
            $link = '<a href="'.route($route, $item->trackable_id).'">'.$name.'</a>';
        }

        switch ($this->type) {
          case 'model':
            $description = '<b>'.(\Lang::has('trackable.event.'.$item->event) ? __('trackable.event.'.$item->event) : Str::ucfirst($item->event)).'</b>';
            break;
          default:
            $description = '<b>'.$model.'</b> '.$link;
            break;
        }

        return Str::ucfirst($description);
    }

    /**
     * Define the tooltip of event.
     *
     * @var string
     */
    public function tooltip($item)
    {
        // Define variables
        $event = $item->event ?? null;
        $relation = $item->relation ?? null;
        $comment = $item->comment ?? null;

        // Define the tooltip
        $name = \Lang::has('trackable.event.'.$event) ? __('trackable.event.'.$event) : Str::ucfirst($event);
        $comment = empty($relation) && !empty($comment) ? ' : '.$comment : '';
        return $name.$comment;
    }

    /**
     * Define the description by relation.
     *
     * @var string
     */
    public function relationTooltip($item)
    {
        // Define variables
        $event = $item->event ?? null;
        $relation = $item->relation ?? null;
        $comment = $item->comment ?? null;

        $model = \Lang::has('backend.model.'.$relation) ? trans_choice('backend.model.'.$relation,1) : Str::ucfirst($relation);
        $comment = !empty($comment) ? ' : '.$comment : '';

        return $model.$comment;
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
