<x-admin-master>
    @section('content')
        <h1>Add Meat</h1>

        <form action="{{route('meats.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Label</label>
                        <input id="title" name="label" type="text" class="form-control"
                               placeholder="Enter label of product">
                    </div>
                    <div class="form-group">
                        <label for="carbon_rate">Carbon rate</label>
                        <input id="carbon_rate" name="carbon_rate" type="text" class="form-control"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="meat_type">Meat type</label>
                        <select class="custom-select" id="meat_type" name="meat_type">
                            <option value="beef" selected>Beef</option>
                            <option value="lamp">Lamp</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
