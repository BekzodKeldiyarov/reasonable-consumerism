<x-admin-master>
    @section('content')
        <h1>Edit Private Transport Travel Record</h1>
        <form action="{{route('goby.private.update')}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="hidden" name="">
                <label for="transport_id">Private Car Type</label>
                <select name="transport_id" id="transport_id" class="custom-select">
                    @foreach($privates as $private)
                        <option value="{{$private->id}}">
                            {{$private->type}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_time">Travel Start Time</label>
                <input type="datetime-local" id="start_time" name="start_time" class="form-control">
            </div>
            <div class="form-group">
                <label for="duration">Duration (minutes)</label>
                <input type="number" id="duration" name="duration" class="form-control">
            </div>
            <button class="btn btn-primary">Add</button>
        </form>
    @endsection
</x-admin-master>
