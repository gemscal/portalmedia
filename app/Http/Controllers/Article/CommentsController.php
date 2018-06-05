<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Comment;
use App\Model\post;
use App\Alerts;
use Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {

        if (Auth::check())
         
            {

                $validator = Validator::make($request->all(), [
                    'comment' => 'required|profane:en,fil'
                ]);

                if ($validator->fails())
                {
                    /*return response()->json($validator->errors());*/
                    Session::flash('warning', 'The comment contains vulgar content');
                    return redirect()->back();
                }
                $post = post::find($post_id);
                $comment = new Comment();
                $comment->name=auth()->user()->name;
                $comment->email=auth()->user()->email;
                $comment->comment=$request->comment;
                $comment->post()->associate($post);

                $comment->save();

                Session::flash('success', 'comment was added');
                return redirect()->route('post', [$post->slug]);
            }

            Session::flash('warning', 'Please Login to add comment');
            return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
