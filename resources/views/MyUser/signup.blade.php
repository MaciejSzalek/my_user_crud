@extends('MyUser.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
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
                    <h3>Signup</h3>
                    <hr />
                    <form action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group" hidden>
                            <label>
                                <input type="text" class="form-control" name="action" value="signup">
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        <hr />
                    </form>
                    <a class="" href="{{ route('users.index') }}">Return to login</a>
                </div>
            </div>
        </div>
    </form>

@endsection