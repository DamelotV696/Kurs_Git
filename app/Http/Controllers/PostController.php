<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact("posts"));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route("post.index");
    }
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        $post->update($data);
        return redirect()->route("post.show", $post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("post.index");
    }

    public function firstOrCreate()
    {
        // $post = Post::find(1);
        $anotherPost = [
            'title' => 'SOME title from laravel',
            'content' => 'SOME content from laravel',
            'image' => 'SOMEImgageFromLaravel.jpg',
            'likes' => 200,
            'is_publish' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'SOME title from laravel'

        ], [
            'title' => 'SOME title from laravel',
            'content' => 'SOME content from laravel',
            'image' => 'SOMEImgageFromLaravel.jpg',
            'likes' => 200,
            'is_publish' => 1,
        ]);
        dd('FOC');
    }

    public function UpdateOrCreate()
    {
        // $post = Post::find(1);
        $anotherPost = [
            'title' => 'UpdateOrCreate title from laravel',
            'content' => 'UpdateOrCreate content from laravel',
            'image' => 'UpdateOrCreateImgageFromLaravel.jpg',
            'likes' => 500,
            'is_publish' => 0,
        ];
        $post = Post::updateOrCreate([
            'title' => 'SOME title not from laravel'

        ], [
            'title' => 'SOME title not from laravel',
            'content' => 'UpdateOrCreate its not content from laravel',
            'image' => 'its not Laravel.jpg',
            'likes' => 500,
            'is_publish' => 0,
        ]);
        dd('UOC');
    }
}
