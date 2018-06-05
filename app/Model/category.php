<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
/*	public function posts()
    	{
    		return $this->belongsToMany('App\Model\post','category_id')->orderBy('created_at','DESC')->paginate(5);
    	}*/

    public function getRouteKeyName()
    	{
    	return 'slug';
    	}
}