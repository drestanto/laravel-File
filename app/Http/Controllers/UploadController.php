<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index() {
    	return view('upload.upload');
    }

    public function store(Request $request) {
    	if ($request->hasFile('image')) {
    		// $request->file('image');
    		Storage::putFileAs('public',$request->file('image'), $request->nama . ".jpg");
    		return "File upload success!!";
    	} else return "No File Selected";
    }
}
