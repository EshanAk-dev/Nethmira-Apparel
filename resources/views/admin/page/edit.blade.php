@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1><i class="far fa-edit"></i>&nbsp;&nbsp;Edit Page</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <form action="" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="card-body">

                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" placeholder="Page name">
                </div>

                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" value="{{ $getRecord->title }}" placeholder="Page title">
                </div>

                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image">
                  @if(!empty($getRecord->getImage()))
                    <img src="{{ $getRecord->getImage() }}" alt="" style="margin-top: 10px;width: 200px;">
                @endif
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control editor" name="description">{{ $getRecord->description }}</textarea>
                </div>
                <hr>

                <div class="form-group">
                  <label>Meta Title</label>
                  <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $getRecord->meta_title) }}" placeholder="Meta Title">
                </div>
                <div class="form-group">
                  <label>Meta Description</label>
                  <textarea class="form-control" placeholder="Meta Description" name="meta_description">{{ old('meta_description', $getRecord->meta_description) }}</textarea>
                </div>
                <div class="form-group">
                  <label>Meta Keywords</label>
                  <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords', $getRecord->meta_keywords) }}" placeholder="Meta Keywords">
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