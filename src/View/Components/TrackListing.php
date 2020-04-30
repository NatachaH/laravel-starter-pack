<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;

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
            $color = 'success';
            break;
          case 'updated':
            $color = 'info';
            break;
          case 'deleted':
            $color = 'danger';
            break;
          case 'soft-deleted':
            $color = 'danger';
            break;
          case 'restored':
            $color = 'success';
            break;
          case 'force-deleted':
            $color = 'danger';
            break;
          default:
            $color = 'primary';
            break;
        }

        return $color;
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
