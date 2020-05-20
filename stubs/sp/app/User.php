<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

use Nh\AccessControl\Traits\HasAccess;
use Nh\Searchable\Traits\Searchable;
use Nh\Trackable\Traits\Trackable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasAccess;
    use Searchable;
    use Trackable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The searchable columns.
     *
     * @var array
     */
    protected $searchable = [
      'name', 'email'
    ];

    /**
     * Default number of items per page.
     * @var int
     */
    protected $perPage = 10;

    /**
     * Encrypt the password when is set.
     * @param string $password
     */
     public function setPasswordAttribute($password)
     {
       if ($password !== null & $password !== "")
       {
           $this->attributes['password'] = Str::startsWith($password, '$2y$') ? $password : bcrypt($password);
       }
     }

    /**
     * Get the tracks record associated with the user.
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function activityTracks()
    {
        return $this->hasMany('\Nh\Trackable\Track');
    }
}
