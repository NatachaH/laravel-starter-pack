<?php

namespace Nh\StarterPack\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\DynamicTemplate;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class MediaDynamic extends DynamicTemplate
{

  /**
   * Media available formats.
   * @var string
   */
  public $formats;

  /**
   * Media min size.
   * @var string
   */
  public $size;

  /**
   * Media min width.
   * @var string
   */
  public $width;

  /**
   * Media min height.
   * @var string
   */
  public $height;

  /**
   * Media max weight.
   * @var string
   */
  public $weight;

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
   * Make the file required.
   * @var boolean
   */
  public $isRequired;

  /**
   * Define the help string
   * @var string
   */
  private function defineHelp($help = '')
  {
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

      if(!empty($this->size))
      {
        $help .= __('sp::help.media.size',['size' => $this->size]).' | ';
      }

      if(!empty($this->width))
      {
        $help .= __('sp::help.media.width',['width' => $this->width]).' | ';
      }

      if(!empty($this->height))
      {
        $help .= __('sp::help.media.height',['height' => $this->height]).' | ';
      }

      if(!empty($this->weight))
      {
        $help .= __('sp::help.media.weight',['weight' => $this->weight]).' | ';
      }

      return substr($help, 0, -3);
  }


  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(
      $legend   = null,
      $listing  = null,
      $template = null,
      $min      = null,
      $max      = null,
      $name     = 'media',
      $type     = 'media',
      $sortable = false,
      $items    = [],
      $defaults = [],
      $itemsDisabled = [],
      $help     = null,
      $btnConfig = 'backend.buttons',
      $before   = null,
      $after    = null

      $formats = null,
      $size = null,
      $width = null,
      $height = null,
      $weight = null,
      $hasName = false,
      $hasPreview = false,
      $hasDownload = false,
      $required = false
  )
  {
      $this->legend           = $legend;
      $this->listing          = $listing;
      $this->template         = $template;
      $this->min              = $min;
      $this->max              = $max;
      $this->name             = $name;
      $this->type             = $type;
      $this->sortable         = $sortable;
      $this->items            = $items;
      $this->defaults         = $this->defineDefaults($defaults);
      $this->itemsDisabled    = is_array($itemsDisabled) ? $itemsDisabled : [$itemsDisabled];
      $this->btnConfig        = $btnConfig;
      $this->before           = $before;
      $this->after            = $after;

      $this->key              = 'KEY_'.$type;
      $this->btnAdd           = $this->defineButton('add');
      $this->btnRemove        = $this->defineButton('remove');
      $this->btnDelete        = $this->defineButton('delete');
      $this->btnMove          = $this->defineButton('move');

      $this->formats          = $formats;
      $this->size             = $size;
      $this->width            = $width;
      $this->height           = $height;
      $this->weight           = $weight;
      $this->hasName          = $hasName;
      $this->hasPreview       = $hasPreview;
      $this->hasDownload      = $hasDownload;
      $this->isRequired       = $required;
      $this->help             = $this->defineHelp($help);
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
