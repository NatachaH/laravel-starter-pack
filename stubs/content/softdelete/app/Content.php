<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Nh\Mediable\Traits\Mediable;
use Nh\Searchable\Traits\Searchable;
use Nh\Trackable\Traits\Trackable;

class {{ UCNAME }} extends Model
{
    use SoftDeletes;
    use Mediable;
    use Searchable;
    use Trackable;

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

    /**
     * The searchable columns.
     *
     * @var array
     */
    protected $searchable = [
      'title', 'subtitle', 'description'
    ];

}
