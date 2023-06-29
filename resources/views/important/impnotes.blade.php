@extends('layout1.dashboardLayout')
@section('title', 'Important Notes')
@section('dashboard')
    
<div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Welcome, {{ Auth::user()->fullname }}</h1>
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
                    <h3 class="card-title">Notes</h3>
                    <div class="card-tools">
                      <a href="{{ url('important/impcompose') }}" class="nav-link">
                        <i class="fas fa-envelope"></i> compose
                      </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                              @foreach($importantData as $data)
                                <tr>
                                  <td>
                                    <a href="{{ route('readImportantNotes', ['id' => $data->id]) }}" style="color: black;">
                                      {{ $loop->iteration }}
                                    </a>
                                  </td>
                                  <td>
                                    <a href="{{ route('readImportantNotes', ['id' => $data->id]) }}" style="color: black;">
                                      <b>{{ $data->title }}</b> - {{ $data->subject }}
                                    </a>
                                  </td>
                                  <td>{{ $data->created_at }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection('dashboard')