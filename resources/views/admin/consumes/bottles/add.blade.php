<x-admin-master>
    @section('content')
        <h1>Adding Bottle Consume Record</h1>
        <form action="{{route('consumes.bottle.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="good_id">Bottle name</label>
                <select name="good_id" id="good_id" class="custom-select">
                    @foreach($bottles as $bottle)
                        <option value="{{$bottle->id}}">
                            @foreach($goods as $good)
                                @if($bottle->id==$good->id)
                                    {{$good->label}}
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
