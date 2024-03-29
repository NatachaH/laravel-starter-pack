<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nh\Mediable\Traits\Mediable;
use Nh\Searchable\Traits\Searchable;
use Nh\Sortable\Traits\Sortable;
use Nh\Trackable\Traits\Trackable;

class {{ UCNAME }} extends Model
{
    use SoftDeletes,
        Mediable,
        Sortable,
        Searchable,
        Trackable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position', 'slug', 'title', 'subtitle', 'description', 'published',
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
     *
     * @var int
     */
    protected $perPage = 10;

    /**
     * Default sortable field and direction.
     *
     * @var array
     */
    protected $sortable = [
        'field' => 'position',
    ];

    /**
     * The searchable columns.
     *
     * @var array
     */
    protected $searchable = [
      'title', 'subtitle', 'description',
    ];

    /**
     * Check if the model is protected (= you can't change the slug)
     *
     * @return bool
     */
    public function getIsProtectedAttribute()
    {
        return in_array($this->slug, []);
    }

    /**
     * Check if the model is available
     *
     * @return bool
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
