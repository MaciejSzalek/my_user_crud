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

    <form action="{{ route('users.edit', $user->id)}}">
        @csrf
        <div class="back">
            <div class="div-center">
                <div class="content">
                    <h3>Account</h3>
                    <hr />
                    <div class="form-group" hidden>
                        <label>
                            <input type="text" class="form-control" name="action" value="edit">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="id">User ID</label>
                        <input type="text" class="form-control" name="id" id="id" value="{{$user->id}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="User Name" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password" required value="{{$user->password}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Account</button>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('users.store')}}">
        <label>
            <input type="text" class="form-control" name="action" value="logout" hidden>
        </label>
        <br>
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

@endsection
