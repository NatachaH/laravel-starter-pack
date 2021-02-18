<?php

namespace Nh\StarterPack\View\Components\Form;

use Illuminate\View\Component;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class MediaDynamic extends Component
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
   * Type of the dynamic
   * @var string
   */
  public $type;

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
   * The default items
   * @var array
   */
  public $defaults;

  /**
   * The disabled items
   * @var array
   */
  public $itemsDisabled;

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
  public $btnMove;

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
   * Are the Media can be previewd.
   * @var boolean
   */
  public $hasPreview;

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
   * Check if is Dynamic and display the add/remove button
   * @return boolean
   */
  public function isDynamic()
  {
      return is_null($this->max) || $this->max != 1;
  }

  /**
   * Check if an item is disabled
   * @param  string  $item
   * @return boolean
   */
  public function isItemDisabled($item)
  {
      return in_array($item, $this->itemsDisabled);
  }

  /**
   * Check if an item is deleted
   * @param  string  $item
   * @return boolean
   */
  public function isItemDeleted($item)
  {
      return in_array($item, old('media_to_delete',[]));
  }

  /**
   * Define the defaults.
   *
   * @var array
   */
  private function defineDefaults($defaults)
  {
      $old = old($this->name.'_to_add');
      $defaultsItems = [];

      if(!empty($old))
      {

          $defaultsItems = Arr::where($old, function ($value, $key) {
              return Str::endsWith($key, '_'.$this->type);
          });

      } else if(!empty($defaults)) {

          foreach ($defaults as $key => $value) {
            $defaultsItems[$key.'_'.$this->type] = $value;
          }

      }

      return $defaultsItems;
  }

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($legend, $template = null, $min = null, $max = null, $name = 'media', $type = 'media', $sortable = false, $items = [], $defaults = [], $itemsDisabled = [], $help = '', $btnAdd = [], $btnRemove = [], $btnDelete = [], $btnMove = [], $formats = null, $hasName = false, $hasPreview = false, $hasDownload = false)
  {
      $this->legend           = $legend;
      $this->min              = $min;
      $this->max              = $max;
      $this->name             = $name;
      $this->type             = $type;
      $this->key              = 'KEY_'.$type;
      $this->sortable         = $sortable;
      $this->items            = $items;
      $this->defaults         = $this->defineDefaults($defaults);
      $this->itemsDisabled    = is_array($itemsDisabled) ? $itemsDisabled : [$itemsDisabled];
      $this->btnAdd           = empty($btnAdd) ? config('dynamic.buttons.add') : $btnAdd;
      $this->btnRemove        = empty($btnRemove) ? config('dynamic.buttons.remove') : $btnRemove;
      $this->btnDelete        = empty($btnDelete) ? config('dynamic.buttons.delete') : $btnDelete;
      $this->btnMove          = empty($btnMove) ? config('dynamic.buttons.sortable') : $btnMove;
      $this->formats          = $formats;
      $this->hasName          = $hasName;
      $this->hasPreview       = $hasPreview;
      $this->hasDownload      = $hasDownload;
      $this->help             = $this->defineHelp();
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
