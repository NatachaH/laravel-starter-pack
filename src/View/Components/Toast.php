<?php

namespace Nh\StarterPack\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Toast extends Component
{
    /**
     * The color of the toast.
     *
     * @var string
     */
    public $color;

    /**
     * The icon to display in the toast.
     * @return string
     */
    public function icon()
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
     * The message to display in the toast.
     *
     * @var string
     */
    public $message;

    /**
     * The delay before autohide.
     *
     * @var string
     */
    public $delay;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $color = 'success', $delay = '10000')
    {
        $this->message   = $message;
        $this->color     = $color;
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
