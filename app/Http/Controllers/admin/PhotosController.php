<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;

use App\Posts;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function store($posts)
    {
        //dd($posts);
        $this->validate(request(), [
    		'photo' => 'required|image|max:2048'
		]);

        Photo::create([
            'post_id' => $posts,
            'url' => request()->file('photo')->store('posts')
        ]);
    }

//    public function storeslider($slider)
//    {
//        $this->validate(request(), [
//            'photo' => 'required|image|max:2048'
//        ]);
//
////        $file = request()->file('photo');
////        $nombrearchivo  = time().'-'.$file->getClientOriginalName();
////        //$file->move(base_path().'/images/sliders', $nombrearchivo);
////        $file->move(public_path().'/images/sliders', $nombrearchivo);
//
//        Photo::create([
//            'product_id' => '0',
//            'slider_id' => $slider,
//            'url' => request()->file('photo')->store('sliders')
//            //request()->file('photo')->store('sliders')
//        ]);
//    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        //unlink(public_path().'/images/'.$photo->url);
        return back()->with('flash', 'Photo delete successfully');
    }
}







