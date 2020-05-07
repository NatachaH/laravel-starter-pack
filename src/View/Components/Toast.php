<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Toast extends Component
{
    /**
     * The message to display in the toast.
     *
     * @var string
     */
    public $message;

    /**
     * The color of the toast.
     *
     * @var string
     */
    public $color;

    /**
     * The icon to display in the toast.
     *
     * @var string
     */
    public $icon;

    /**
     * The delay before autohide.
     *
     * @var int
     */
    public $delay;

    /**
     * The icon to display in the toast.
     * @return string
     */
    private function defineIcon()
    {
        switch ($this->color) {
          case 'success':
            $icon = 'icon-checkmark';
            break;
          case 'danger':
            $icon = 'icon-cross';
            break;
          case 'warning':
            $icon = 'icon-warning';
            break;
          case 'info':
            $icon = 'icon-information';
            break;
          default:
            $icon = 'icon-bell';
            break;
        }

        return $icon;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $color = 'success', $icon = null, $delay = 10000)
    {
        $this->message   = $message;
        $this->color     = $color;
        $this->icon      = is_null($icon) ? $this->defineIcon() : $icon;
        $this->delay     = $delay;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.toast');
    }
}
