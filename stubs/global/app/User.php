<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Nh\AccessControl\Traits\HasAccess;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasAccess;

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
      if ( $password !== null & $password !== "" )
      {
          $this->attributes['password'] = bcrypt($password);
      }
    }
}
