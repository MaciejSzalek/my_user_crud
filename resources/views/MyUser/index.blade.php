@extends ('MyUser.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store')}}" method="POST">
        @csrf

        <div class="back">
            <div class="div-center">
                <div class="content">
                    <h3>Login</h3>
                    <hr />
                    <form action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group" hidden>
                            <label>
                                <input type="text" class="form-control" name="action" value="login">
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <hr />
                    </form>
                    <a class="" href="{{ route('users.create') }}">Sign Up</a>
                </div>
            </div>
        </div>
    </form>

@endsection
