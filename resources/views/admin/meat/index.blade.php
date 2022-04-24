<x-admin-master>
    @section('content')
        <h1>All Meats</h1>
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('message')}}</div>
        @elseif(\Illuminate\Support\Facades\Session::has('message-success'))
            <div
                class="alert-success p-2"> {{\Illuminate\Support\Facades\Session::get('message-success')}}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Meats</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Carbon rate</th>
                            <th>Meat type</th>
                            <th>Created Time</th>
                            <th>Updated Time</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Carbon rate</th>
                            <th>Meat type</th>
                            <th>Created Time</th>
                            <th>Updated Time</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($meats as $meat)
                            <tr>
                                <td>{{$meat->id}}</td>
                                <td>
                                    @foreach($goods as $good)
                                        @if($good->id==$meat->id)
                                            {{ $good-> label}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$meat->carbon_rate}}</td>
                                <td>{{$meat->meat_type}}</td>
                                <td>{{$meat->created_at->diffForHumans()}}</td>
                                <td>{{$meat->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{route('meats.edit', $meat->id)}}">Update</a>
                                </td>
                                <td>
                                    <form method="post" action="{{route('meats.destroy', ['id'=>$meat->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
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
