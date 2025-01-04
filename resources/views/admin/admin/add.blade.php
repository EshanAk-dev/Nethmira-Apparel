@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1><i class="fa-regular fa-square-plus"></i>&nbsp;&nbsp;Add New Admin</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <form action="" method="post">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label>Name <span style="color: red;">*</span> </label>
                  <input type="text" class="form-control" name="name" required value="{{ old('name') }}" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label>Email <span style="color: red;">*</span> </label>
                  <input type="email" class="form-control" name="email" required value="{{ old('email') }}" placeholder="Enter email">
                  <div style="color:red">
                    {{ $errors->first('email') }}
                  </div>
                </div>

                <div class="form-group">
                  <label>Password <span style="color: red;">*</span> </label>
                  <input type="password" class="form-control" name="password" required placeholder="Password">
                </div>

                <div class="form-group">
                  <label>Status <span style="color: red;">*</span> </label>
                  <select class="form-control" name="status" required>
                    <option {{ (old('status') == 0 ) ? 'selected' : '' }} value="0">Active</option>
                    <option {{ (old('status') == 1 ) ? 'selected' : '' }} value="1">Inactive</option>
                  </select>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection

@section('script')
@endsection