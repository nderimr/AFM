<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
   
   public function article()
    {
        return $this->belongsTo('App\Article');
    }
}