<x-admin-master>
    @section('content')
        <h1>Add Private Transport</h1>

        <form action="{{route('transports.private.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emission_rate">Emission Rate</label>
                        <input id="emission_rate" name="emission_rate" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="capacity_efficiency">Capacity Efficiency</label>
                        <input id="capacity_efficiency" name="capacity_efficiency" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="meat_type">Type</label>
                        <select class="custom-select" id="meat_type" name="type">
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
