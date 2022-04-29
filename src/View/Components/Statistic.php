<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;

class Statistic extends Component
{
    /**
     * The title of the statistic.
     *
     * @var string
     */
    public $title;

    /**
     * The value of the statistic.
     *
     * @var string
     */
    public $value;

    /**
     * The unit of the value of the statistic.
     *
     * @var string
     */
    public $unit;

    /**
     * The icon of the statistic.
     *
     * @var string
     */
    public $icon;

    /**
     * The color of the statistic.
     *
     * @var string
     */
    public $color;

    /**
     * The url of the statistic.
     *
     * @var string
     */
    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $value = null, $unit = null, $icon = 'icon-rocket', $color = 'primary', $url = null)
    {
        $this->title  = $title;
        $this->value  = $value;
        $this->unit   = $unit;
        $this->icon   = $icon;
        $this->color  = $color;
        $this->url    = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.statistic');
    }
}
