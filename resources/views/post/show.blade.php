@extends("layouts.main")
@section('content')
    <div class="container">
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-success">Edit</a>
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger">
            {{-- <a href="">Destroy</a><br><br> --}}
        </form>
        <a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
    </div>
@endsection