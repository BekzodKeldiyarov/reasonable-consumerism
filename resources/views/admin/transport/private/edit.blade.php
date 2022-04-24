<x-admin-master>
    @section('content')
        <h1>Edit Private Transport</h1>

        <form action="{{route('transports.private.update')}}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" value="{{$transport->id}}" name="id">
                    <div class="form-group">
                        <label for="emission_rate">Emission Rate</label>
                        <input id="emission_rate" name="emission_rate" type="text" class="form-control"
                               value="{{$transport->emission_rate}}">
                    </div>
                    <div class="form-group">
                        <label for="capacity_efficiency">Capacity Efficiency</label>
                        <input id="capacity_efficiency" name="capacity_efficiency" type="text" class="form-control"
                               value="{{$transport->capacity_efficiency}}">
                    </div>
                    <div class="form-group">
                        <label for="private_type">Type</label>
                        <select class="custom-select" id="private_type" name="type">
                            <option value="car" selected>Car</option>
                            <option value="truck">Truck</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
