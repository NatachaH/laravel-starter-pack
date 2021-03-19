<?php

namespace Nh\StarterPack\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class BreadcrumbComposer
{

    /**
     * Array of crumbs
     * @var array
     */
    protected $crumbs = [];

    /**
     * Is the breadcrumb need to be displayed
     * @var boolean
     */
    protected $hasBreadcrumb = false;

    /**
     * Get the current route name
     * @var string
     */
    protected $route;

    /**
     * Section
     * @var string
     */
    protected $section;

    /**
     * Model
     * @var string
     */
    protected $model;

    /**
     * Item
     * @var array
     */
    protected $item;

    /**
     * Action
     * @var string
     */
    protected $action;

    /**
     * Construct the breadcrumb
     * @return void
     */
    public function __construct()
    {

        // The current route name
        $this->route = Route::currentRouteName();

        // Explode the route name
        $explode = Str::of($this->route)->explode('.');

        if(count($explode) > 1)
        {
              // Define the model
              $this->model = Str::singular($explode[1]);

              // Define the name
              $this->item = Route::current()->parameters[$this->model] ?? null;

              // Define the action
              $this->action = $explode[2] ?? null;

              // Define the section
              $config = config('backend.sidebar');
              $hasSection = Arr::where($config, function ($value, $key) {
                  return $key == $this->model || Arr::has($value, 'items.'.$this->model);
              });
              $section = key($hasSection) ?? null;
              $this->section = !empty($section) && $section != $this->model ? $section : null;

        }

        // Define all the breadcrumbs
        $this->defineCrumbs();

        // Define if need to display the breadcrumb
        $this->hasBreadcrumb = !empty($this->crumbs) && count($this->crumbs) > 1;

    }

    /**
     * Define the array breadcrumbs
     * @return void
     */
    protected function defineCrumbs()
    {
        if(!empty($this->section))
        {
            $section = (\Lang::has('backend.sidebar.'.$this->section) ? __('backend.sidebar.'.$this->section) : $this->section);
            $this->crumbs[$section] = null;
        }

        if(!empty($this->model))
        {
            $model = (\Lang::has('backend.model.'.$this->model) ? trans_choice('backend.model.'.$this->model,2) : $this->model);
            $modelRoute = Str::beforeLast($this->route, '.').'.index';
            $this->crumbs[$model] = Route::has($modelRoute) ? $modelRoute : null;
        }

        if(!empty($this->item))
        {
            $item = $this->item->title ?? $this->item->name;
            $itemRoute = Str::beforeLast($this->route, '.').'.show';
            $this->crumbs[Str::limit($item, 15)] = Route::has($itemRoute) ? route($itemRoute,$this->item->id) : null;
        }

        if(!empty($this->action))
        {
            $action = (\Lang::has('sp::action.'.$this->action) ? __('sp::action.'.$this->action) : $this->action);
            $this->crumbs[$action] = $this->route;
        }
    }

    /**
    * Bind data to the view.
    *
    * @param  \Illuminate\View\View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with(['crumbs'=> $this->crumbs, 'hasBreadcrumb' => $this->hasBreadcrumb]);
    }

}
