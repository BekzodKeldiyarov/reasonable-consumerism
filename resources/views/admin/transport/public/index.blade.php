<x-admin-master>
    @section('content')
        <h1>All Public transports</h1>
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('message')}}</div>
        @elseif(\Illuminate\Support\Facades\Session::has('message-success'))
            <div
                class="alert-success p-2"> {{\Illuminate\Support\Facades\Session::get('message-success')}}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Public transports</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Emission Rate</th>
                            <th>Capacity Efficiency</th>
                            <th>Created Time</th>
                            <th>Updated Time</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Emission Rate</th>
                            <th>Capacity Efficiency</th>
                            <th>Created Time</th>
                            <th>Updated Time</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($transports as $transport)
                            @foreach($publics as $public)
                                @if($public->id==$transport->id)
                                    <tr>
                                        <td>{{$transport->id}}</td>
                                        <td>{{Illuminate\Support\Str::ucfirst($public->type)}}</td>
                                        <td>{{$transport->emission_rate}}</td>
                                        <td>{{$transport->capacity_efficiency}}</td>
                                        <td>{{$transport->created_at->diffForHumans()}}</td>
                                        <td>{{$transport->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('transports.public.edit', $public->id)}}"
                                               class="btn btn-primary">Update</a>
                                        </td>
                                        <td>
                                            <form method="post"
                                                  action="{{route('transports.public.destroy', ['id'=>$public->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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

    @section('scripts')
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
