<x-admin-master>
    @section('content')
        <h1>Create</h1>

        <form action="{{route('goods.store')}}" method="post">
            @csrf
            <input type="hidden" name="good_type" value="plastic"
                   aria-label="Radio button for following text input">
            <div class="form-group">
                <label for="title">Label</label>
                <input id="title" name="label" type="text" class="form-control" placeholder="Enter label of product">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="plastic_type" id="" class="custom-select">
                            <option value="bottle" selected>Bottle</option>
                            <option value="package">Package</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="biodigration_time">Enter Biodigration time</label>
                        <input id="biodigration_time" name="biodigration_time" type="text" class="form-control"
                               placeholder="1 year">
                    </div>
                    <div class="form-group">
                        <label for="toxic_spread_emission">Toxic emission</label>
                        <input id="toxic_spread_emission" name="toxic_spread_emission" type="text" class="form-control"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="polyethylene_density">Polyethylene</label>
                        <input id="polyethylene_density" name="polyethylene_density" type="text" class="form-control"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume</label>
                        <input id="volume" name="volume" type="text" class="form-control"
                               placeholder="Keep blank if adding package">
                    </div>
                    <div class="form-group">
                        <label for="size">Volume</label>
                        <input id="size" name="size" type="text" class="form-control"
                               placeholder="Keep blank if adding bottle">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection
</x-admin-master>
