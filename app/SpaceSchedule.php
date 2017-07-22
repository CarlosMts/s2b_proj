<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaceSchedule extends Model
{
    protected $table = 'space_schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'space_id',
        'week_day',
        'open_hour',
        'close_hour',
        'all_day',
        'closed',
    ];
}
