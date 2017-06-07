<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class UploadController extends Controller
{
    public function index() {
    	return view('upload.upload');
    }

    public function store(Request $request) {
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
    		$nama = $request->nama . "." . $ext;
    		Storage::putFileAs('public',$request->file('file'), $nama);

    		$file = new \App\File;
    		$file->path = $nama;
    		$file->save();
    		return "File upload success!!";
    	} else return "No File Selected";
    }
}
