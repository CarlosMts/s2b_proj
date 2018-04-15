<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour_type extends Model
{
    protected $table = 'hour_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type'
    ];
}
