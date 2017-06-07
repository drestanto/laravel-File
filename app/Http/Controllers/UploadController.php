<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index() {
    	return view('upload.upload');
    }

    public function store(Request $request) {
    	return $request->file('image');
    }
}
