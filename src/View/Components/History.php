<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;

class History extends Component
{

    /**
     * Title of the History statistic
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
     * Define the title of the History statistic.
     *
     * @var string
     */
    private function defineTitle()
    {
        if($this->type == 'user')
        {
          $title = __('trackable.history');
        } else {
          $title = trans_choice('trackable.latest',($this->isMultiple ? 2 : 1));
        }
        return $title;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $type = 'global', $items = null, $value = null)
    {
        $this->type       = in_array($type,['global','model','user']) ? $type : 'global';
        $this->items      = $items;
        $this->isMultiple = is_null($items) || $items->count() == 0 ? false : true;
        $this->value      = $this->isMultiple ? $items->first()->time : $value;
        $this->title      = is_null($title) ? $this->defineTitle() : $title;
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
