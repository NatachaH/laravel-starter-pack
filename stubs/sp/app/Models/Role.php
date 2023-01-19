<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nh\AccessControl\Traits\HasPermissions;
use Nh\Searchable\Traits\Searchable;
use Nh\Trackable\Traits\Trackable;

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
        'guard', 'name',
    ];

    /**
     * The searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'guard', 'name',
    ];

    /**
     * Check if the role is protected
     *
     * @return bool
     */
    public function getIsProtectedAttribute()
    {
        return in_array($this->guard, config('access-control.protected'));
    }

    /**
     * Check if the role guard is protected (in case of hasRoles() use in code)
     *
     * @return bool
     */
    public function getHasGuardProtectedAttribute()
    {
        return in_array($this->guard, config('access-control.guard-protected'));
    }
}
