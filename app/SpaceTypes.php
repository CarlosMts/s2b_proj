<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaceTypes extends Model
{
    protected $table = 'space_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'short_name',
    ];
}
