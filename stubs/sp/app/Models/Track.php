<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nh\Trackable\Traits\AsTrack;

use Nh\Searchable\Traits\Searchable;
use Nh\Sortable\Traits\Sortable;

class Track extends Model
{

    use AsTrack,
        Searchable,
        Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event','comment','number'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
      'user','trackable','relation'
    ];

    /**
     * The searchable columns.
     *
     * @var array
     */
    protected $searchable = [
      'id', 'event', 'comment'
    ];

    /**
     * Default number of items per page.
     * @var int
     */
    protected $perPage = 20;

    /**
     * Default sortable field and direction.
     * @var array
     */
    protected $sortable = [
        'field' => 'id',
        'direction' => 'desc'
    ];

    /**
     * Get the model record associated with the user.
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function user()
    {
        $userclass = class_exists('App\Models\User') ? 'App\Models\User' : 'App\User';
        return $this->belongsTo($userclass, 'user_id')->withTrashed();
    }

}
