<x-admin-master>
    @section('content')
        <h1>Edit bottle - {{$package->id}}</h1>

        <form
            action="{{route('packages.update')}}"
            method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$package->id}}">
                        <label for="title">Label</label>
                        <input id="title" name="label" type="text" class="form-control"
                               placeholder="Enter label of product" value="{{$good->label}}">
                    </div>
                    <div class="form-group">
                        <label for="biodigration_time">Enter Biodigration time</label>
                        <input id="biodigration_time" name="biodigration_time" type="text" class="form-control"
                               placeholder="1 year" value="{{$plastic->biodigration_time}}">
                    </div>
                    <div class="form-group">
                        <label for="toxic_spread_emission">Toxic emission</label>
                        <input id="toxic_spread_emission" name="toxic_spread_emission" type="text" class="form-control"
                               placeholder="" value="{{$plastic->toxic_spread_emission}}">
                    </div>
                    <div class="form-group">
                        <label for="polyethylene_density">Polyethylene</label>
                        <input id="polyethylene_density" name="polyethylene_density" type="text" class="form-control"
                               placeholder="" value="{{$plastic->polyethylene_density}}">
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input id="size" name="size" type="text" class="form-control" value="{{$package->size}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
