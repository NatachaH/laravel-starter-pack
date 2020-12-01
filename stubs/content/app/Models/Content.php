<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Nh\Mediable\Traits\Mediable;
use Nh\Searchable\Traits\Sortable;
use Nh\Searchable\Traits\Searchable;
use Nh\Trackable\Traits\Trackable;

class {{ UCNAME }} extends Model
{

    use Mediable,
        Sortable,
        Searchable,
        Trackable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'description', 'published'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
       'published' => 'boolean'
    ];

    /**
     * Default number of items per page.
     * @var int
     */
    protected $perPage = 10;

    /**
     * Default sortable field and direction.
     * @var array
     */
    protected $sortable = [
        'field' => 'title'
    ];

    /**
     * The searchable columns.
     *
     * @var array
     */
    protected $searchable = [
      'title', 'subtitle', 'description'
    ];

}
