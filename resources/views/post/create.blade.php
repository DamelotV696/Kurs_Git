@extends("layouts.main")
@section('content')
    <div class="container">
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{old('title')}}">
                @error('title')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" placeholder="Content" name="content">{{old('content')}}</textarea>
                @error('content')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" placeholder="image" name="image" value="{{old('image')}}">
                @error('image')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="md-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option {{old('category_id') == $category->id ? ' selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select class="form-select" multiple aria-label="Multiple select example" name="tags[]">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection