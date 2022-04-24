<x-admin-master>
    @section('content')
        <h1>Adding Meat Consume Record</h1>
        <form action="{{route('consumes.meat.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="good_id">Meat name</label>
                <select name="good_id" id="good_id" class="custom-select">
                    @foreach($meats as $meat)
                        <option value="{{$meat->id}}">
                            @foreach($goods as $good)
                                @if($meat->id==$good->id)
                                    {{$good->label}} -- ({{$meat->meat_type}})
                                @endif
                            @endforeach
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="consume_date">Consume date</label>
                <input type="date" id="consume_date" name="consume_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" class="form-control">
            </div>
            <button class="btn btn-primary">Add</button>
        </form>
    @endsection
</x-admin-master>
