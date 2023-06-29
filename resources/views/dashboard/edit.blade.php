@extends('layout1.dashboardLayout')
@section('title', 'Edit Notes')
@section('dashboard')

<div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ Auth::user()->fullname }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
              <li class="breadcrumb-item active">
                <a href="{{ route('logout') }}">
                  @csrf
                  Logout
                </a>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                      <a href="{{ url('dashboard/compose') }}" class="nav-link">
                      <i class="fas fa-envelope"></i> compose
                      </a>
                  </li>
                  <li class="nav-item active">
                      <a href="{{ url('dashboard/notes') }}" class="nav-link">
                      <i class="fas fa-inbox"></i> Notes
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('important/impnotes') }}" class="nav-link">
                      <i class="fa fa-exclamation-triangle"></i> Important
                      </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Edit New Notes</h3>
              </div>
              @if(Session::has('success'))
                <p class="alert alert-info" role="alert">{{ Session::get('success') }}</p>
              @endif
              <!-- /.card-header -->
              <form action="{{ route('editNotes', ['id'=> $notedata->id ]) }}" method="post">
               @csrf   
              <div class="card-body">
                  <div class="form-group">
                    <input class="form-control" name="title" value="{{ $notedata->title }}" placeholder="Title:">
                  </div>
                  <div class="form-group">
                      <textarea name="subject" class="form-control">{{ $notedata->subject }}</textarea>
                  </div>
                </div>
              <!-- /.card-body -->
                <div class="card-footer">
                  <div class="float-right">
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>Save</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection('dashboard')