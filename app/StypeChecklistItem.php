<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StypeChecklistItem extends Model
{
    protected $table = 'stype_checklist_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'checklist_item_id',
        'check',
    ];
}
