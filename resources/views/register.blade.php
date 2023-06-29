@extends('layout1.loginRegisterLayout')

@section('title', 'Register')

@section('content')

<div class="register-box">
  <div class="register-logo">
    <a href="{{ route('welcome') }}"><b>NotesDiary</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      @if(Session::has('registered'))
        <p class="alert alert-info">{{ Session::get('registered') }}. Go to <a href="{{ route('login') }}" class="text-center">Login</a> to start.</p>
      @endif
      <form action="{{ route('registered') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="fullname" class="form-control" placeholder="Fullname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection('content')