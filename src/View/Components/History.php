<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;

class History extends Component
{


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
     * The first track list time.
     *
     * @var string
     */
    public $value;

    /**
     * Is there multiple history or only one.
     *
     * @var boolean
     */
    public $isMultiple;

    /**
     * Define the badge color by event name.
     *
     * @var string
     */
    public function colorByEvent($event)
    {
        switch ($event) {
          case 'created':
          case 'restored':
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
          default:
            $color = 'gray';
            break;
        }
        return $color;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'global', $items = null, $value = '')
    {
        $this->type       = in_array($type,['global','model','user']) ? $type : 'global';
        $this->items      = $items;
        $this->isMultiple = is_null($items) || $items->count() == 0 ? false : true;
        $this->value      = $this->isMultiple ? $items->first()->time : $value;
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
