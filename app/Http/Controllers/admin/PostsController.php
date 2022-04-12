<?php

namespace App\Http\Controllers\admin;

use App\Citys;
use App\Posts;
use App\States;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        permitUser('PSV', auth()->user()->permissions );
        $posts = Posts::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required|unique:posts,title']);
        $post = Posts::create([
            'title' => $request->get('title'),
            'url' => Str::slug($request->get('title')),
            'status' => '0',
        ]);
        generaRecords('Post created', 'Post created successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Posts $post)
    {
        permitUser('PSE', auth()->user()->permissions );
        $states = States::where('status','=', '1')->get();
        $citys = Citys::where('status','=', '1')->get();
        return view('admin.posts.edit', compact('post', 'states', 'citys'));
    }

    public function update(Request $request, Posts $post)
    {
        //dd($request);
        $this->validate($request, [
            'title' => 'required|unique:posts,title,'.$post->id,
        ]);

        $post->update([
            'title' => $request->input('title'),
            'url' => Str::slug($request->get('title')),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
//            'status' => $request->input('status'),
        ]);
        $post->save();

        generaRecords('Post updated', 'Post <b>' .$request->input('title'). '</b> updated successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Post has been saved correctly.');
    }

//    public function destroy(States $state)
//    {
//        $state->update([
//            'status' => '0',
//        ]);
//        $state->save();
//        generaRecords('States removed', 'States <b>' .$state->name. '</b> removed successfully, for '. auth()->user()->name .'.');
//        return redirect()->route('admin.states.index')->with('flash', 'State has been removed.');
//    }
}
