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
     * Format of the media
     * @var string
     */
    public $formats;

    /**
     * Media with name input
     * @var boolean
     */
    public $hasName;

    /**
     * Enable the download button.
     *
     * @var boolean
     */
    public $hasDownload;

    /**
     * Is the media input are sortable
     * @var boolean
     */
    public $sortable;

    /**
     * The help message-
     * @var string
     */
    public $help;

    /**
     * Define the help string
     * @var string
     */
    public function defineHelp()
    {
        $help = '';

        if(!empty($this->min))
        {
          $help .= __('sp::help.min',['min' => $this->min]).' | ';
        }

        if(!empty($this->max))
        {
          $help .= __('sp::help.max',['max' => $this->max]).' | ';
        }

        if(!empty($this->formats))
        {
          $help .= __('sp::help.formats',['formats' => $this->formats]).' | ';
        }

        return substr($help, 0, -3);
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legend = null, $min = 1, $max = null, $type = 'picture', $current = [], $formats = null, $hasName = false, $hasDownload = false, $sortable = false)
    {
        $this->legend       = is_null($legend) ? trans_choice('sp::backend.model.media', 2) : $legend;
        $this->min          = $min;
        $this->max          = $max;
        $this->type         = $type;
        $this->current      = $current;
        $this->formats      = $formats;
        $this->hasName      = $hasName;
        $this->hasDownload  = $hasDownload;
        $this->sortable     = $sortable;
        $this->help         = $this->defineHelp();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('sp::components.form.media-dynamic');
    }
}
