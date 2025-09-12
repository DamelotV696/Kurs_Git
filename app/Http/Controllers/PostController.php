<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::where("is_publish", 1)->first();
        dump($post->title);
        dd('end');
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
}
