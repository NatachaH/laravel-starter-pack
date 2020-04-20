<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Nh\Mediable\Traits\Mediable;

class {{ UCNAME }} extends Model
{

    use Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'description'
    ];

    /**
     * Default number of items per page.
     * @var int
     */
    protected $perPage = 10;

}
