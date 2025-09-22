@extends("layouts.main")
@section('content')
    <div class="container">
        <form action="{{route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                    value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" placeholder="Content"
                    name="content">{{$post->content}}</textarea>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" class="form-control" id="image" placeholder="image" name="image"
                        value="{{$post->image}}">
                </div>
                <div class="md-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option {{$category->id === $post->category->id ? 'selected' : ''}} value="{{$category->id}}">
                                {{$category->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select class="form-select" multiple aria-label="Multiple select example" name="tags[]">
                        @foreach ($tags as $tag)
                            <option @foreach ($post->tags as $postTag) {{$tag->id === $postTag->id ? 'selected' : ''}}
                            @endforeach value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection