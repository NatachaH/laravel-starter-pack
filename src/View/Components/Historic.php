<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;

class Historic extends Component
{


    /**
     * Type of Historic
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
     * Is there multiple historic or only one.
     *
     * @var boolean
     */
    public $isMultiple;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'global', $items = null, $value = '')
    {
        $this->type       = in_array($type,['global','model','user']) ? $type : 'global';
        $this->items      = $items;
        $this->isMultiple = is_null($items) || $items->count() == 0 ? false : true
        $this->value      = $this->isMultiple ? $items->first()->time : $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.historic');
    }
}
