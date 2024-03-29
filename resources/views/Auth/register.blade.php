@extends('Auth.layouts.main')

@section('content')
    <form action="/register" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control form-control-user" placeholder="Fullname">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword"
                placeholder="Password">
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            Register
        </button>
    </form>
@endsection
