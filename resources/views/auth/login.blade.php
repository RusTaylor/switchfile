@extends('home')
@section('content')
    <div class="container">
        <form method="post" action="{{url('/login')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp" placeholder="Enter name">
                <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-info">Войти в систему</button>
        </form>
    </div>
@endsection