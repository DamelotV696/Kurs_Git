@extends("layouts.main")
@section('content')
    <div>
        <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Create</a>
    </div>
    <div class="">
        @foreach ($posts as $post)
            <a href="{{route('post.show', $post->id)}}">
                <div>{{$post->id}}. {{$post->title}}</div>
            </a>
        @endforeach
    </div>
@endsection