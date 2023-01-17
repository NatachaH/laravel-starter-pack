<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Nh\AccessControl\Traits\HasPermissions;
use Nh\Trackable\Traits\Trackable;
use Nh\Searchable\Traits\Searchable;


class Role extends Model
{

    use Searchable,
        HasPermissions,
        Trackable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guard','name'
    ];

      /**
     * The searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'guard','name'
    ];

    /**
     * Check if the role is protected
     * @return boolean
     */
    public function getIsProtectedAttribute()
    {
       return in_array($this->guard, config('access-control.protected'));
    }

    /**
     * Check if the role guard is protected (in case of hasRoles() use in code)
     * @return boolean
     */
    public function getHasGuardProtectedAttribute()
    {
       return in_array($this->guard, config('access-control.guard-protected'));
    }

}
