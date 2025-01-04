@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;System Settings</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
      @include('admin.layouts._message')
        <div class="col-md-12">
          <div class="card card-primary">
            <form action="" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label>Website<span style="color: red;">*</span> </label>
                  <input type="text" class="form-control" name="website_name" placeholder="Website name" value="{{ $getRecord->website_name }}">
                </div>

                <div class="form-group">
                  <label>Logo <span style="color: red;"></span> </label>
                  <input type="file" class="form-control" name="logo">
                  @if(!empty($getRecord->getLogo()))
                    <img src="{{ $getRecord->getLogo() }}" style="width: 200px;margin-top: 10px;">
                  @endif
                </div>

                <div class="form-group">
                  <label>Fevicon <span style="color: red;"></span> </label>
                  <input type="file" class="form-control" name="fevicon">
                  @if(!empty($getRecord->getFevicon()))
                    <img src="{{ $getRecord->getFevicon() }}" style="width: 50px;margin-top: 10px;">
                  @endif
                </div>

                <div class="form-group">
                  <label>Footer Description <span style="color: red;"></span> </label>
                  <textarea class="form-control" name="footer_description">{{ $getRecord->footer_description }}</textarea>
                </div>

                <div class="form-group">
                  <label>Footer Logo <span style="color: red;"></span> </label>
                  <input type="file" class="form-control" name="footer_logo">
                  @if(!empty($getRecord->getFooterLogo()))
                    <img src="{{ $getRecord->getFooterLogo() }}" style="width: 200px;margin-top: 10px;">
                  @endif
                </div>

                <hr />

                <div class="form-group">
                  <label>Address <span style="color: red;"></span> </label>
                  <textarea class="form-control" name="address">{{ $getRecord->address }}</textarea>
                </div>

                <div class="form-group">
                  <label>Phone <span style="color: red;"></span> </label>
                  <input type="text" class="form-control" name="phone" value="{{ $getRecord->phone }}">
                </div>

                <div class="form-group">
                  <label>Submit Contact Email <span style="color: red;"></span> </label>
                  <input type="text" class="form-control" name="submit_email" value="{{ $getRecord->submit_email }}">
                </div>
                
                <div class="form-group">
                  <label>Email <span style="color: red;"></span> </label>
                  <input type="text" class="form-control" name="email" value="{{ $getRecord->email }}">
                </div>

                <div class="form-group">
                  <label>Working Hours <span style="color: red;"></span> </label>
                  <textarea class="form-control editor" name="working_hour">{{ $getRecord->working_hour }}</textarea>
                </div>

                <hr />

                <div class="form-group">
                  <label>Facebook Link <span style="color: red;"></span> </label>
                  <input type="text" class="form-control" name="facebook_link" value="{{ $getRecord->facebook_link }}">
                </div>

                <div class="form-group">
                  <label>Twitter Link <span style="color: red;"></span> </label>
                  <input type="text" class="form-control" name="twitter_link" value="{{ $getRecord->twitter_link }}">
                </div>

                <div class="form-group">
                  <label>Instagram Link <span style="color: red;"></span> </label>
                  <input type="text" class="form-control" name="instagram_link" value="{{ $getRecord->instagram_link }}">
                </div>

                <div class="form-group">
                  <label>Youtube Link <span style="color: red;"></span> </label>
                  <input type="text" class="form-control" name="youtube_link" value="{{ $getRecord->youtube_link }}">
                </div>

                <div class="form-group">
                  <label>Pinterest Link <span style="color: red;"></span> </label>
                  <input type="text" class="form-control" name="pinterest_link" value="{{ $getRecord->pinterest_link }}">
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