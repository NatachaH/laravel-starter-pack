<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Nh\Mediable\Traits\Mediable;
use Nh\Searchable\Traits\Searchable;
use Nh\Sortable\Traits\Sortable;
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
        'slug', 'title', 'subtitle', 'description', 'published',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'published' => 'boolean',
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
        'field' => 'position'
    ];

    /**
     * The searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'title', 'subtitle', 'description'
    ];

    /**
     * Check if the model is available
     * 
     * @return boolean
     */
    public function getIsAvailableAttribute()
    {
        return $this->published;
    }

    /**
     * Scope a query if model is available.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable(Builder $query)
    {
        // Get only published
        return $query->where('published', 1);
    }

}
