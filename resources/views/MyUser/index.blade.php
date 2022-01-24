@extends ('MyUser.layout')

@section('content')
    <form action="{{ route('users.store')}}" method="POST">
        @csrf

    <div class="back">
        <div class="div-center">
            <div class="content">
                <h3>Login</h3>
                <hr />
                <form action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <hr />
                </form>
                <a class="" href="{{ route('users.create') }}">Sign Up</a>
            </div>
        </div>

@endsection()