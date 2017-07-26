<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table='activities';

    public function users()
    {
    	return $this->belongsToMany('App/User','activity_log');
    }

    public function articles()
    {
    	return $this->belongsToMany('App/Article','activity_log');
    }
}
