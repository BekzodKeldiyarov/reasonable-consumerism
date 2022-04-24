<x-admin-master>
    @section('content')
        <h1>Editing Alternative Transport Travel Record</h1>
        <div class="alert alert-danger" role="alert">
            Please, Add your custom record if you sure about data you enter
        </div>
        <form action="{{route('alternative.update')}}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="transport_id" value="{{$transport->id}}">
            <input type="hidden" name="start_time" value="{{$start_time}}">
            <div class="form-group">
                <label for="emission_rate">Enter emission rate</label>
                <input type="text" name="emission_rate" id="emission_rate" class="form-control"
                       value="{{$transport->emission_rate}}">
            </div>
            <div class="form-group">
                <label for="capacity_efficiency">Enter Capacity Efficiency</label>
                <input type="text" name="capacity_efficiency" id="capacity_efficiency" class="form-control"
                       value="{{$transport->capacity_efficiency}}">
            </div>
            <div class="form-group">
                <label for="start_time">Travel Start Time</label>
                <input type="datetime-local" id="start_time" name="start_time_new" class="form-control"
                       value="{{$start_time}}">
            </div>
            <div class="form-group">
                <label for="duration">Duration (minutes)</label>
                <input type="number" id="duration" name="duration" class="form-control"
                       value="{{$duration_time}}">
            </div>
            <button class="btn btn-primary">Add</button>
        </form>
    @endsection
</x-admin-master>
