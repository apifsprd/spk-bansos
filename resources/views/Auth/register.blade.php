@extends('Auth.layouts.main')

@section('content')
<form action="/register" method="POST">
    @csrf
    <img class="mb-4" src="/img/logo_kabupatentangerang_perda.png" alt="" width="150">
    <h1 class="h3 mb-3 fw-normal">Registration</h1>

    <div class="form-floating">
        <input type="name" class="form-control" id="name" name="name" placeholder="Full Name">
        <label for="name">Full Name</label>
      </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email"  placeholder="name@example.com">
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <label for="password">Password</label>
    </div>

    <div class="checkbox mb-3">
      {{-- <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label> --}}
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
@endsection