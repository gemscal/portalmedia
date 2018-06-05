<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\post;


class PostController extends Controller
{
    //
    public function post(post $post)
    {
    	return view('post',compact('post'));
    	/*return view('post');*/
    }
}
