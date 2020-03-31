<?php

namespace App\View\Components;

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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $value, $icon, $color)
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('backend.components.statistic');
    }
}
