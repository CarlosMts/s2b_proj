<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{

	protected $table = 'spaces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'name', 'type_id',
        'user_id', 'name', 'type', 'address', 'zipcode', 'city', 'country', 'description'
    ];

    public function image()
    {
        return $this->hasMany('App\Image');
    }
}
