<x-admin-master>
    @section('content')
        <h1>User Profile</h1>
        <h2>{{$user->name}}</h2>

        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="name" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation-confirm">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                               id="password_confirmation">
                    </div>

                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
