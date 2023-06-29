@extends('layout1.loginRegisterLayout')

@section('title', 'Login')

@section('content')
  <div class="content mt-5">
    <section class="content-header mt-5">
      <div class="container mt-5">
        <div class="row mb-2 mt-5">
          <div class="col-sm-6 mt-5">
            <h1>404 Error Page</h1>
          </div>
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard/notes') }}">Home</a></li>
              <li class="breadcrumb-item active">404 Error Page</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
          </p>
        </div>
      </div>
    </section>
  </div>
</body>
</html>
@endsection('content')