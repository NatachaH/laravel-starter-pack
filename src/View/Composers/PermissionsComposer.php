<?php

namespace Nh\StarterPack\View\Composers;

use Illuminate\View\View;
use Nh\AccessControl\Models\Permission;

class PermissionsComposer
{

    /**
     * The permissions with model
     * @var Illuminate\Database\Eloquent\Collection
     */
    protected $permissionsWithModel;

    /**
     * The permissions without model
     * @var Illuminate\Database\Eloquent\Collection
     */
    protected $permissionsWithoutModel;

    /**
     * Construct the composer
     * @return void
     */
    public function __construct()
    {
      $this->permissionsWithModel = Permission::whereNotNull('model')->select('id','model','action')->orderBy('name')->get()->groupBy('model');
      $this->permissionsWithoutModel = Permission::whereNull('model')->select('id','name')->orderBy('name')->get();
    }

    /**
    * Bind data to the view.
    *
    * @param  \Illuminate\View\View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with(['permissionsWithModel'=> $this->permissionsWithModel, 'permissionsWithoutModel' => $this->permissionsWithoutModel]);
    }

}
