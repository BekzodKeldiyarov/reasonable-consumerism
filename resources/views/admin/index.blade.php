<x-admin-master>

    @section('content')

        @if(auth()->user())
            <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
            <h2>{{Illuminate\Support\Str::ucfirst(auth()->user()->name)}}</h2>
        @endif
        @php
            $total=0;
            $mydate = '';
            $values = array(
                "01"=>0,
                "02"=>0,
                "03"=>0,
                "04"=>0,
                "05"=>0,
                "06"=>0,
                "07"=>0,
                "08"=>0,
                "09"=>0,
                "10"=>0,
                "11"=>0,
                "12"=>0,
            );
        @endphp
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Bottle Consume Records</h6>
                    <a href="{{route('consumes.bottle.new')}}" class="btn btn-outline-primary">Record New Consume</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Consume Date</th>
                            <th>Amount</th>
                            <td>Biodigration Time of one</td>
                            <td>Spread Emission of one</td>
                            <td>Polyethylene Density of one</td>
                            <td>Volume</td>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Consume Date</th>
                            <th>Amount</th>
                            <td>Biodigration Time of one</td>
                            <td>Spread Emission of one</td>
                            <td>Polyethylene Density of one</td>
                            <td>Volume</td>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach(auth()->user()->goods as $good)
                            @foreach($bottles as $bottle)
                                @if($good->id==$bottle->id)
                                    <tr>
                                        <td>
                                            {{$good->label}} {{$good->id}}
                                        </td>
                                        <td>
                                            {{$mydate = $good->pivot->consume_date}}
                                        </td>
                                        <td>
                                            {{$good->pivot->amount}}
                                        </td>
                                        @foreach($plastics as $plastic)
                                            @if($plastic->id==$good->id)
                                                <td>{{$plastic->biodigration_time}}</td>
                                                <td>{{$plastic->toxic_spread_emission}}</td>
                                                <td>{{$plastic->polyethylene_density}}</td>
                                                <td>{{$bottle->volume}}</td>
                                                <span
                                                    class="d-none">{{$total = $good->pivot->amount*($plastic->biodigration_time*$plastic->toxic_spread_emission/$plastic->polyethylene_density)}}</span>
                                            @endif
                                        @endforeach
                                        <td>
                                            <a href="{{route('consumes.bottle.edit', ['good_id'=>$good->id, 'consume_date'=>$good->pivot->consume_date])}}"
                                               class="btn btn-primary">Update</a>
                                        </td>
                                        <td>
                                            <form
                                                action="{{route('consumes.bottle.destroy', ['good_id'=>$good->id, 'consume_date'=>$good->pivot->consume_date])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>

                                        @php
                                            if($mydate!=null){
                                                $monthValue = DateTime::createFromFormat('Y-m-d', $mydate)->format('m');
                                                $values[$monthValue] +=$total;
                                                }
                                        @endphp
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Package Consume Records</h6>
                    <a href="{{route('consumes.package.new')}}" class="btn btn-outline-primary">Record New Consume</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Consume Date</th>
                            <th>Amount</th>
                            <td>Biodigration Time of one</td>
                            <td>Spread Emission of one</td>
                            <td>Polyethylene Density of one</td>
                            <td>Size</td>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Consume Date</th>
                            <th>Amount</th>
                            <td>Biodigration Time of one</td>
                            <td>Spread Emission of one</td>
                            <td>Polyethylene Density of one</td>
                            <td>Volume</td>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach(auth()->user()->goods as $good)
                            @foreach($packages as $package)
                                @if($good->id==$package->id)
                                    <tr>
                                        <td>
                                            {{$good->label}}
                                        </td>
                                        <td>{{$mydate=$good->pivot->consume_date}}</td>
                                        <td>{{$good->pivot->amount}}</td>
                                        @foreach($plastics as $plastic)
                                            @if($plastic->id==$good->id)
                                                <td>{{$plastic->biodigration_time}}</td>
                                                <td>{{$plastic->toxic_spread_emission}}</td>
                                                <td>{{$plastic->polyethylene_density}}</td>
                                                <td>{{$package->size}}</td>
                                                <span
                                                    class="d-none">{{$total = $good->pivot->amount*($plastic->biodigration_time*$plastic->toxic_spread_emission/pow(2, 2))}}</span>
                                            @endif
                                        @endforeach
                                        <td>
                                            <a href="{{route('consumes.package.edit', ['good_id'=>$good->id, 'consume_date'=>$good->pivot->consume_date])}}"
                                               class="btn btn-primary">Update</a>
                                        </td>
                                        <td>
                                            <form
                                                action="{{route('consumes.bottle.destroy', ['good_id'=>$good->id, 'consume_date'=>$good->pivot->consume_date])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        @php
                                            if($mydate!=null){
                                                $monthValue = DateTime::createFromFormat('Y-m-d', $mydate)->format('m');
                                                $values[$monthValue] +=$total;}
                                        @endphp
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Meat Consume Records</h6>
                    <a href="{{route('consumes.meat.new')}}" class="btn btn-outline-primary">Record New Consume</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Consume Date</th>
                            <th>Amount</th>
                            <th>Carbon rate</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Consume Date</th>
                            <th>Amount</th>
                            <th>Carbon rate</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach(auth()->user()->goods as $good)
                            @foreach($meats as $meat)
                                @if($good->id==$meat->id)
                                    <tr>
                                        <td>
                                            {{$good->label}}
                                        </td>
                                        <td>{{$mydate = $good->pivot->consume_date}}</td>
                                        <td>{{$meat->carbon_rate}}</td>
                                        <td>{{$good->pivot->amount}}</td>
                                        <td>
                                            <a href="{{route('consumes.meat.edit', ['good_id'=>$good->id, 'consume_date'=>$good->pivot->consume_date])}}"
                                               class="btn btn-primary">Update</a>
                                        </td>
                                        <td>
                                            <form
                                                action="{{route('consumes.meat.destroy', ['good_id'=>$good->id, 'consume_date'=>$good->pivot->consume_date])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <span
                                            class="d-none">{{$total = $good->pivot->amount*($meat->carbon_rate/3)}}</span>
                                    </tr>
                                    @php
                                        if($mydate!=null){
                                            $monthValue = DateTime::createFromFormat('Y-m-d', $mydate)->format('m');
                                            $values[$monthValue] +=$total;
                                            }
                                    @endphp
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Private Transports Record</h6>
                    <a href="{{route('goby.private.new')}}" class="btn btn-outline-primary">Record New Travel</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Private Transport Type</th>
                            <th>Travel Start Time</th>
                            <th>Duration</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Consume Date</th>
                            <th>Duration</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach(auth()->user()->transports as $transport)
                            @foreach($privates as $private)
                                @if($transport->id==$private->id)
                                    <tr>
                                        <td>
                                            @foreach($privates as $private)
                                                @if($transport->id==$private->id)
                                                    {{Illuminate\Support\Str::ucfirst($private->type)}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$transport->pivot->start_time}}</td>
                                        <td>
                                            {{$transport->pivot->duration_time}}
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{route('goby.private.edit', ['user_id'=>auth()->user()->id, 'transport_id'=>$transport->id, 'start_time'=>$transport->pivot->start_time])}}">Update</a>
                                        </td>
                                        <td>
                                            <form method="post"
                                                  action="{{route('goby.private.destroy', ['user_id'=>auth()->user()->id, 'transport_id'=>$transport->id, 'start_time'=>$transport->pivot->start_time])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Public Transports Record</h6>
                    <a href="{{route('goby.public.new')}}" class="btn btn-outline-primary">Record New Travel</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Public Transport Type</th>
                            <th>Travel Start Time</th>
                            <th>Duration</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Public Transport Type</th>
                            <th>Travel Start Time</th>
                            <th>Duration</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach(auth()->user()->transports as $transport)
                            @foreach($publics as $public)
                                @if($transport->id==$public->id)
                                    <tr>
                                        <td>
                                            @foreach($publics as $public)
                                                @if($transport->id==$public->id)
                                                    {{Illuminate\Support\Str::ucfirst($public->type)}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$transport->pivot->start_time}}</td>
                                        <td>
                                            {{$transport->pivot->duration_time}}
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{route('goby.public.edit', ['user_id'=>auth()->user()->id, 'transport_id'=>$transport->id, 'start_time'=>$transport->pivot->start_time])}}">Update</a>
                                        </td>
                                        <td>
                                            <form method="post"
                                                  action="{{route('goby.public.destroy', ['user_id'=>auth()->user()->id, 'transport_id'=>$transport->id, 'start_time'=>$transport->pivot->start_time])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Alternative Transports Record</h6>
                    <a href="{{route('alternative.new')}}" class="btn btn-outline-primary">Record New Travel</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Public Transport Type</th>
                            <th>Travel Start Time</th>
                            <th>Duration</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Public Transport Type</th>
                            <th>Travel Start Time</th>
                            <th>Duration</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach(auth()->user()->transports as $transport)
                            @foreach($alternatives as $alternative)
                                @if($transport->id==$alternative->id)
                                    <tr>
                                        <td>
                                            @foreach($alternatives as $alternative)
                                                @if($transport->id==$alternative->id)
                                                    Alternative Transport
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$transport->pivot->start_time}}</td>
                                        <td>
                                            {{$transport->pivot->duration_time}}
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{route('alternative.edit', ['user_id'=>auth()->user()->id, 'transport_id'=>$transport->id, 'start_time'=>$transport->pivot->start_time , 'duration_time'=>$transport->pivot->duration_time])}}">Update</a>
                                        </td>
                                        <td>
                                            <form method="post"
                                                  action="{{route('alternative.destroy', ['user_id'=>auth()->user()->id, 'transport_id'=>$transport->id, 'start_time'=>$transport->pivot->start_time])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection


    @section('charts')
        <div class="container-fluid">
            <div class="d-none visually-hidden">
                {{$private_count = 0}}
                {{$public_count = 0}}
                {{$alternative_count = 0}}
            </div>
            <div class="d-none">
                @foreach(auth()->user()->transports as $transport)
                @foreach($privates as $private)
                @if($transport->id==$private->id)
                {{$private_count++}}
                @endif
                @endforeach
                @foreach($publics as $private)
                @if($transport->id==$private->id)
                {{$public_count++}}
                @endif
                @endforeach
                @foreach($alternatives as $alternative)
                @if($transport->id==$alternative->id)
                {{$alternative_count++}}
                @endif
                @endforeach
                @endforeach
                </h2>
            </div>
            <div class="d-none">
                <span id="private">{{$private_count}}</span>
                <span id="public">{{$public_count}}</span>
                <span id="alternative">{{$alternative_count}}</span>
            </div>
            <!-- Content Row -->
            <div class="row">

                <div class="col-xl-8 col-lg-7">

                    <!-- Bar Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="myBarChart"></canvas>
                            </div>
                            <hr>
                        </div>
                    </div>

                </div>

                <!-- Donut Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Transport Usage</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <hr>
                            Distribution of transport usage
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            var jArray = <?php echo json_encode($values); ?>
        </script>
    @endsection
</x-admin-master>
