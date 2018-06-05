<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function post() {
        return $this->hasMany('App\Model\post');
    }

    public function page() {
       return $this->hasMany('App\Model\Page');
   }
}
