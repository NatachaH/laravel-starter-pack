<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class ModalConfirm extends Component
{
    /**
     * The color of the modal.
     *
     * @var string
     */
    public $color;

    /**
     * The name of the modal.
     *
     * @var string
     */
    public $name;

    /**
     * The title to display in the modal.
     *
     * @var string
     */
    public $title;

    /**
     * The message to display in the modal.
     *
     * @var string
     */
    public $message;

    /**
     * The url action for the form in the modal.
     *
     * @var string
     */
    public $action;

    /**
     * The method of the form in the modal.
     *
     * @var string
     */
    public $method;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = 'danger', $name = 'confirmModal', $title, $message, $action = '#', $method = 'POST')
    {
        $this->name     = $name;
        $this->title    = $title;
        $this->message  = $message;
        $this->color    = $color;
        $this->action   = $action;
        $this->method   = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('backend.components.modal-confirm');
    }
}
