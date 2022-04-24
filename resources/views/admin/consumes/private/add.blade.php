<x-admin-master>
    @section('content')
        <h1>Adding Private Transport Travel Record</h1>
        <form action="{{route('goby.private.store')}}" method="post">
            @csrf
            <div class="form-group">
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
