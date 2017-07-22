<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpacePrice extends Model
{
    protected $table = 'space_prices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'space_id',
        'user_id',
        'type',
    ];
}
