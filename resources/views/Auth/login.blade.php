@extends('Auth.layouts.main')

@section('content')
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Login Gagal! <br />
        <span style="font-size: 11px">{{ session('error') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form action="/authenticate" method="POST">
        @csrf
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
        <button type="submit" class="btn btn-primary btn-user btn-block mt-5">
            LOGIN
        </button>
    </form>
@endsection
