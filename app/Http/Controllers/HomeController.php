<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\post;
use App\Model\Page;
use App\Model\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::where('status','PUBLISHED')->orderBy('created_at','DESC')->paginate(3);
        $pages = Page::take(1)->where('status', 'ACTIVE')->orderBy('created_at','DESC')->get();
        return view('welcome',compact('posts', 'pages'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function page()
    {
        $pages = Page::take(1)->where('status', 'ACTIVE')->orderBy('created_at','DESC')->get();
        return view('page')->with('pages', $pages);
    }

}
