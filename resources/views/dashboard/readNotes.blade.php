@extends('layout1.dashboardLayout')
@section('title', 'Read Notes {{ $NotesData->id }}')
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
              <li class="breadcrumb-item active">Notes</li>
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
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Read Notes</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                  <h1>{{ $NotesData->title }}</h1>

                  <p>{{ $NotesData->subject }}</p>

                  <p class="float-right">Date Created -> {{ $NotesData->created_at }}</p>
                </div>
              </div>
              <div class="card-footer">
                <form action="{{ route('deleteNotes', ['id' => $NotesData->id]) }}">
                  @csrf
                  <button class="btn btn-danger"><i class="far fa-trash-alt"></i>Delete</button>
                </form>
                <form action="{{ route('editNotes', ['id' => $NotesData->id]) }}">
                  @csrf
                  <button class="btn btn-info"><i class="fas fa-pencil-alt"></i>Edit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection('dashboard')