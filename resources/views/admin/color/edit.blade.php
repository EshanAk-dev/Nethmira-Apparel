@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1><i class="far fa-edit"></i>&nbsp;&nbsp;Edit Color</h1>
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
                  <label>Color Name <span style="color: red;">*</span> </label>
                  <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" placeholder="Enter color name">
                </div>

                <div class="form-group">
                  <label>Color Code <span style="color: red;">*</span> </label>
                  <input type="color" class="form-control" name="code" value="{{ old('code', $getRecord->code) }}">
                </div>

                <div class="form-group">
                  <label>Status <span style="color: red;">*</span> </label>
                  <select class="form-control" name="status" required>
                    <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                    <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                  </select>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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