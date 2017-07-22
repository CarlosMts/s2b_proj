<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $table = 'checklist_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'isFilter',
        'haveValue',
    ];
}

