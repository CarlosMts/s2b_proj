<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_begin', 'date_end', 'hour_type_id', 'weekend', 'user_id', 'space_id',
    ];

}
