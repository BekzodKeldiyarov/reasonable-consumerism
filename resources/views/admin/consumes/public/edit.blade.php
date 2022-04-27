<x-admin-master>
    @section('content')
        <h1>Edit Public Transport Travel Record</h1>
        <form action="{{route('goby.public.update')}}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="transport_id" value="{{$goby->transport_id}}" >
            <input type="hidden" name="start_time" value="{{$goby->start_time}}" >
            <div class="form-group">
                <input type="hidden" name="">
                <label for="transport_id">Public Transport Type</label>
                <select name="transport_id_new" id="transport_id" class="custom-select">
                    @foreach($publics as $public)
                        <option value="{{$public->id}}">
                            {{$public->type}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_time">Travel Start Time</label>
                <input type="datetime-local" id="start_time" name="start_time_new" class="form-control">
            </div>
            <div class="form-group">
                <label for="duration">Duration (minutes)</label>
                <input type="number" id="duration" name="duration_time_new" class="form-control" value="{{$goby->duration_time}}">
            </div>
            <button class="btn btn-primary">Add</button>
        </form>
    @endsection
</x-admin-master>
