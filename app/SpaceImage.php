<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaceImage extends Model
{
    protected $fillable = ['space_id', 'img_name', 'img_thumb', 'img_size', 'created_by'];

    public function gallery()
    {
    	return $this->belongsTo('App\Space');
    }
}
