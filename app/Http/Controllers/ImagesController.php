<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public static function upload()
    {
        $images = Image::all();
        return view('images.index',[
            'images' => $images
        ]);

    }

    public static function uploadImage(Request $request)
    {
        $path = $request->file->store('public');
        Image::insert(['path' => basename($path)]);
        return redirect()->route('contents.upload');
    }


}
