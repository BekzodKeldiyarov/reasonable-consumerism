<x-admin-master>
    @section('content')
        <h1>Edit bottle - {{$meat->id}}</h1>

        <form
            action="{{route('meats.update')}}"
            method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="id" value="{{$meat->id}}">
                    <div class="form-group">
                        <label for="title">Label</label>
                        <input id="title" name="label" type="text" class="form-control"
                               placeholder="Enter label of product" value="{{$good->label}}">
                    </div>
                    <div class="form-group">
                        <label for="carbon_rate">Carbon rate</label>
                        <input id="carbon_rate" name="carbon_rate" type="text" class="form-control"
                               placeholder="" value="{{$meat->carbon_rate}}">
                    </div>
                    <div class="form-group">
                        <label for="meat_type">Meat type</label>
                        <select class="custom-select" id="meat_type" name="meat_type">
                            <option value="govyadina" selected>Govyadina</option>
                            <option value="baranina">Baranina</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
