<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function index()
    {
    	return view('upload.upload');
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
	        'nama' => 'required',
	    ]);
	    if ($validator->fails()) {
	        return back()
	            ->withInput()
	            ->withErrors($validator);
	    }
    	if ($request->hasFile('file')) {
    		$ext = $request->file('file')->extension();
    		$path = $request->nama . "." . $ext;
    		Storage::putFileAs('public',$request->file('file'), $path);

    		$file = new \App\File;
            $file->name = $request->nama;
    		$file->path = $path;
    		$file->save();
    		return "File upload success!!";
    	} else return "No File Selected";
    }

    public function showImage($path)
    {
    	$url = Storage::url($path);
    	return "<img src='" . $url . "'>";
    }

    public function showImageByName($name)
    {
        $path = DB::table('files')->where('name',$name)->first()->path;
        $url = Storage::url($path);
        return "<img src='" . $url . "'>";
    }

    public function showAllImages()
    {
        $files = \App\File::all();
        foreach ($files as $file) {
            $file->path = Storage::url($file->path);
        }

        return view('upload.images',compact('files'));
    }

    public function search($keyword)
    {
        $files = DB::table('files')->where('name','like', '%' . $keyword . '%')->get();
        foreach ($files as $file) {
            $file->path = Storage::url($file->path);
        }

        return view('upload.images',compact('files','keyword'));
    }
}
