@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ url('') }}/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Change Password</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    @include('user._sidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="">
                            @include('layouts._message')
                                    <form action="" method="post">
                                        {{ csrf_field() }}
                                            
                                        <label>Old Password <span style="color: red;">*</span></label>
                                        <input type="password" name="old_password" class="form-control" required>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>New Password <span style="color: red;">*</span></label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Confirm New Password <span style="color: red;">*</span></label>
                                                <input type="password" name="cpassword" class="form-control" required>
                                            </div>

                                        </div><!-- End .row -->

                                        <div style="display: flex;justify-content: center;">
                                            <button type="submit" style="width: 180px;" class="btn btn-outline-primary-2 btn-order btn-block">
                                                update password
                                            </button>
                                        </div>
                                    </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection