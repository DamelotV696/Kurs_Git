<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post', compact("posts"));
    }
    public function create()
    {
        $postsArr = [
            [
                'title' => 'title from laravel',
                'content' => 'content from laravel',
                'image' => 'imgageFromLaravel.jpg',
                'likes' => 900,
                'is_publish' => 1,
            ],
            [
                'title' => 'another title from laravel',
                'content' => 'another content from laravel',
                'image' => 'AnotherImgageFromLaravel.jpg',
                'likes' => 400,
                'is_publish' => 1,
            ]
        ];
        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('createrd');
    }
    public function update()
    {
        $post = Post::find(5);
        $post->update([
            'title' => '1111 updated',
            'content' => '1111 updated',
            // 'image' => 'updated',
            // 'likes' => 1000,
            // 'is_publish' => 0,
        ]);
        dd('updated');
    }
    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
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
