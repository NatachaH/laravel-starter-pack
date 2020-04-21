<?php

namespace Nh\StarterPack\View\Components\Form;

use Illuminate\View\Component;

class MediaFieldset extends Component
{


    /**
     * The legend of the fieldset
     * @var string
     */
    public $legend;

    /**
     * The type of the media in the fieldset
     * @var string
     */
    public $type;

    /**
     * Array of the current media
     * @var array
     */
    public $current;

    /**
     * Media with name input
     * @var boolean
     */
    public $hasName;

    /**
     * Is there multiple inputs (dynamic from nh/bs-component)
     * @var boolean
     */
    public $isMultiple;

    /**
     * Minimum nbr of inputs
     * @var int
     */
    public $min;

    /**
     * Maximum nbr of inputs
     * @var int
     */
    public $max;

    /**
     * Format of the media
     * @var string
     */
    public $formats;

    /**
     * Help
     * @var string
     */
    public function help()
    {
        $help = '';

        if(!empty($this->min))
        {
          $help .= __('sp::help.media.min',['min' => $this->min]).' | ';
        }

        if(!empty($this->max))
        {
          $help .= __('sp::help.media.max',['max' => $this->max]).' | ';
        }

        if(!empty($this->formats))
        {
          $help .= __('sp::help.media.formats',['formats' => $this->formats]).' | ';
        }

        return substr($help, 0, -3);
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legend = null, $type, $current = [], $hasName = false, $isMultiple = false, $min = 1, $max = null, $formats = null)
    {
        $this->legend       = is_null($legend) ? trans_choice('sp::media.media', ($isMultiple ? 2 : 1)) : $legend;
        $this->type         = $type;
        $this->current      = $current;
        $this->hasName      = $hasName;
        $this->isMultiple   = $isMultiple;
        $this->min          = $min;
        $this->max          = $max;
        $this->formats      = $formats;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.form.media-fieldset');
    }
}
