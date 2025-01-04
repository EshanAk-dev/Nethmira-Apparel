@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-regular fa-users"></i>&nbsp;&nbsp;Customer List &nbsp;<span style="color: blue;">( Total : {{ $getRecords->total() }})</span></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    @include('admin.layouts._message')

                    <form method="get">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;Customer Search</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <div class="row">
                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" name="id" placeholder="ID" class="form-control" value="{{ Request::get('id') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" placeholder="Name" class="form-control" value="{{ Request::get('name') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" placeholder="Email" class="form-control" value="{{ Request::get('email') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>From Date</label>
                      <input type="date" style="padding: 6px;" name="from_date" class="form-control" value="{{ Request::get('from_date') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>To Date</label>
                      <input type="date" style="padding: 6px;" name="to_date" class="form-control" value="{{ Request::get('to_date') }}">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary">Search</button>
                        <a href="{{ url('admin/customer/list') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

          </form>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customer List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecords as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        @if($value->status == 0)
                                        <td style="color: green;">Active</td>
                                        @elseif($value->status == 1)
                                        <td style="color: crimson;">Inactive</td>
                                        @endif
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/customer/delete', $value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                            {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))
                            ->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

        </div>
    </section>
</div>

@endsection

@section('script')

@endsection