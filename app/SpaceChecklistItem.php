<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaceChecklistItem extends Model
{
    protected $table = 'space_checklist_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'space_id',
        'stype_checklist_item_id',
        'status',
    ];
}

