<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class TrackListing extends Component
{
    /**
     * The tracks list.
     *
     * @var Illuminate\Database\Eloquent\Collection
     */
    public $tracks;

    /**
     * The icon to display in the toast.
     * @return string
     */
    public function colorByEvent($event)
    {
        switch ($event) {
          case 'created':
            $icon = 'success';
            break;
          case 'updated':
            $icon = 'info';
            break;
          case 'deleted':
            $icon = 'danger';
            break;
          case 'restored':
            $icon = 'success';
            break;
          case 'force-deleted':
            $icon = 'danger';
            break;
          default:
            $icon = 'primary';
            break;
        }

        return $icon;
    }

    public function eventName($key)
    {
        return \Lang::has('trackable.event.'.$key) ? __('trackable.event.'.$key) : $key;
    }

    public function modelName($model)
    {
        $key = Str::lower(class_basename($model));
        return \Lang::has('backend.model.'.$key) ? trans_choice('backend.model.'.$key,1) : $key;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tracks)
    {
        $this->tracks  = $tracks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.track-listing');
    }
}
