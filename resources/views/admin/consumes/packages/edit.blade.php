<x-admin-master>
    @section('content')
        <h1>Editing Bottle Consume Record</h1>
        <form action="{{route('consumes.bottle.update')}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="good_id">Bottle name</label>
                <input type="hidden" value="{{$consume->good_id}}" name="good_id">
                <select name="good_id_new" id="good_id" class="custom-select">
                    @foreach($bottles as $bottle)
                        <option value="{{$bottle->id}}"
                        @if($bottle->id==$consume->good_id)
                            {{'selected'}}
                            @endif>
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
                <input type="hidden" id="consume_date" name="consume_date" class="form-control"
                       value="{{$consume->consume_date}}" readonly>
            </div>

            <div class="form-group">
                <label for="consume_date">Consume date</label>
                <input type="date" id="consume_date" name="consume_date_new" class="form-control"
                       value="{{$consume->consume_date}}">
            </div>


            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{$consume->amount}}">
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    @endsection
</x-admin-master>
