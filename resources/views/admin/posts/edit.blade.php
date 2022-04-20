<x-admin-master>
    @section('content')
        <h1>Edit a post</h1>

        <form action="{{route('posts.update', $post->id),}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" name="title" type="text" class="form-control" placeholder="Enter Title"
                       value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div><img src="{{$post->post_image}}" alt="" height="100"></div>
                <input id="image" type="file" name="post_image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="Body">Body</label>
                <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection
</x-admin-master>
