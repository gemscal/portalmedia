<?php

namespace App\Http\Controllers;

use App\Model\Gallery;
use Illuminate\Http\Request;

class FileController extends Controller
{
/*    public function showUploadForm()
    {
    	return view('gallery');
    }
*/
    public function storeFile(request $request)
    {
    	if ($request->hasFile('file'))
    	{
    		$filename =  $request->file->getClientOriginalName();
    		$filesize =  $request->file->getClientSize();
            $filetitle =  $request->title;
    		$request->file->storeAs('public/gallery', $filename);
    		$file = new Gallery;
    		$file->image = $filename;
    		$file->size = $filesize;
            $file->title = $filetitle;
    		$file->save();
    		return redirect()->back();
    	}
    	return $request->all();

    }


    public function gallery()
    {
        $gallery = Gallery::orderBy('created_at','DESC')->paginate(5);
        return view('gallery')->with('gallery', $gallery);
    }
}
