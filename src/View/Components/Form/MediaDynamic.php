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
   * Name for the inputs
   * By default it's name + '_to_update', '_to_delete' and '_to_add'
   * @var string
   */
  public $name;

  /**
   * Default KEY to replace for the template
   * @var string
   */
  public $key;

  /**
   * Is the list sortable ?
   * If true display a button to drag&drop + an input with the position.
   * @var boolean
   */
  public $sortable;

  /**
   * The current items
   * @var array
   */
  public $items;

  /**
   * The path for the current item view
   * @var string
   */
  public $viewItem;

  /**
   * Options to pass to the view
   * @var array
   */
  public $viewItemOptions;

  /**
   * The help message of the fieldset.
   *
   * @var string
   */
  public $help;

  /**
   * Information for the add button
   * Class, label and value
   * @var array
   */
  public $btnAdd;

  /**
   * Information for the remove buttons
   * Class, label and value
   * @var array
   */
  public $btnRemove;

  /**
   * Information for the delete buttons
   * Class, label and value
   * @var array
   */
  public $btnDelete;

  /**
   * Information for the sortable buttons
   * Class, label and value
   * @var array
   */
  public $btnSortable;


  /**
   * Media type
   * @var string
   */
  public $type;

  /**
   * Media available formats.
   * @var string
   */
  public $formats;

  /**
   * Are the Media have name.
   * @var boolean
   */
  public $hasName;


  /**
   * Are the Media can be download.
   * @var boolean
   */
  public $hasDownload;

  /**
   * Define the help string
   * @var string
   */
  private function defineHelp()
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
  public function __construct($legend, $template = null, $min = null, $max = null, $name = 'media', $key = 'KEY', $sortable = false, $items = [], $help = '', $btnAdd = [], $btnRemove = [], $btnDelete = [], $btnSortable = [], $type = 'media', $formats = null, $hasName = false, $hasDownload = false)
  {
      $this->legend           = $legend;
      $this->min              = $min;
      $this->max              = $max;
      $this->name             = $name;
      $this->key              = $key.'_'.$type;
      $this->sortable         = $sortable;
      $this->items            = $items;
      $this->help             = $this->defineHelp();
      $this->btnAdd           = empty($btnAdd) ? config('dynamic.buttons.add') : $btnAdd;
      $this->btnRemove        = empty($btnRemove) ? config('dynamic.buttons.remove') : $btnRemove;
      $this->btnDelete        = empty($btnDelete) ? config('dynamic.buttons.delete') : $btnDelete;
      $this->btnSortable      = empty($btnSortable) ? config('dynamic.buttons.sortable') : $btnSortable;
      $this->type             = $type;
      $this->formats          = $formats;
      $this->hasName          = $hasName;
      $this->hasDownload      = $hasDownload;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
      return view('bs-component::form.dynamic-template', ['listing' => 'sp::includes.form.media-dynamic-listing', 'template' => 'sp::includes.form.media-dynamic-template']);
  }


}
