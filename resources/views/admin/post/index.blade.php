@extends('layouts.admin');
@section('content')
    <div class="mt-3">
        <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Create</a>
    </div>
    @foreach ($posts as $post)
        <a href="{{route('post.show', $post->id)}}">
            <div>{{$post->id}}. {{$post->title}}</div>
        </a>
    @endforeach
    <div class="mt-3">
        {{$posts->withQueryString()->links()}}
    </div>
@endsection