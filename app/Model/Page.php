<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    public function user()
    {
        return $this->belongsTo('App\Model\User','author_id','id');
    }
}
