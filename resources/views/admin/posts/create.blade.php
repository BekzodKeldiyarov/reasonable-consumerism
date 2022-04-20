<x-admin-master>
    @section('content')
        <h1>Create</h1>

        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" name="title" type="text" class="form-control" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input id="image" type="file" name="post_image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="Body">Body</label>
                <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection
</x-admin-master>
