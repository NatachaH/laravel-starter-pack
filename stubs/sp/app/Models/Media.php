<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nh\Mediable\Traits\AsMedia;
use Nh\Sortable\Traits\Sortable;

class Media extends Model
{
    use AsMedia,
        SoftDeletes,
        Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position', 'name', 'mime', 'extension', 'type',
    ];

    /**
     * Default sortable field and direction.
     *
     * @var array
     */
    protected $sortable = [
        'field' => 'position',
        'direction' => 'asc',
        'event-on-parent' => true,
        'parent' => 'mediable',
    ];
}
