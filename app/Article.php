<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Article extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable=['title','content','type','workflowName','state'];

   /**
   *
   * Creates relation with comments table
   *
   * @return      
   *
   */
    
     public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
    public function activities()
    {
    	return $this->belongsToMany('App\Activity');
    }
    
     public function files()
    {
    	return $this->hasMany('App\File');
    }


}
