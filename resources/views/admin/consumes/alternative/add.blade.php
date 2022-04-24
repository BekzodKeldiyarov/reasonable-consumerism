<x-admin-master>
    @section('content')
        <h1>Adding Alternative Transport Travel Record</h1>
        <div class="alert alert-danger" role="alert">
            Please, Add your custom record if you sure about data you enter
        </div>
        <form action="{{route('alternative.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="emission_rate">Enter emission rate</label>
                <input type="text" name="emission_rate" id="emission_rate" class="form-control">
            </div>
            <div class="form-group">
                <label for="capacity_efficiency">Enter Capacity Efficiency</label>
                <input type="text" name="capacity_efficiency" id="capacity_efficiency" class="form-control">
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
