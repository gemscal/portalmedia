<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //

/*    public function categories()
    {
    	return $this->belongsToMany('App\Model\category','category_id')->withTimestamps();
    }*/
    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function comments()
    {
    	return $this->hasMany('App\Model\Comment');
    }

    public function user(){
        return $this->belongsTo('App\Model\User','author_id','id');
    }
}
