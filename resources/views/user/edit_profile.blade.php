@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ url('') }}/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Edit Profile</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <div class="row" style="padding-left: 20px;">
                                <div class="col-lg-9">
                                    @include('layouts._message')
                                    <form action="" method="post">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name <span style="color: red;">*</span></label>
                                                <input type="text" name="first_name" value="{{ $getRecord->name }}" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Last Name <span style="color: red;">*</span></label>
                                                <input type="text" name="last_name" value="{{ $getRecord->last_name }}" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>Email address <span style="color: red;">(read only)</span></label>
                                        <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" readonly required>

                                        <label>Country <span style="color: red;">*</span></label>
                                        <input type="text" name="country" value="{{ $getRecord->country }}" class="form-control" required>

                                        <label>Street address <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="address_one" value="{{ $getRecord->address_one }}" placeholder="House number and Street name" required>
                                        <input type="text" class="form-control" name="address_two" value="{{ $getRecord->address_two }}" placeholder="Appartments, suite, unit etc ...">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Town / City <span style="color: red;">*</span></label>
                                                <input type="text" name="city" value="{{ $getRecord->city }}" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label for="state">Province <span style="color: red;">*</span></label>
                                                <select name="state" id="state" class="form-control" required>
                                                    <option value="">Select Province</option>
                                                    <option value="Central" <?php echo ($getRecord->state == 'Central') ? 'selected' : ''; ?>>Central</option>
                                                    <option value="Eastern" <?php echo ($getRecord->state == 'Eastern') ? 'selected' : ''; ?>>Eastern</option>
                                                    <option value="Northern" <?php echo ($getRecord->state == 'Northern') ? 'selected' : ''; ?>>Northern</option>
                                                    <option value="North Central" <?php echo ($getRecord->state == 'North Central') ? 'selected' : ''; ?>>North Central</option>
                                                    <option value="North Western" <?php echo ($getRecord->state == 'North Western') ? 'selected' : ''; ?>>North Western</option>
                                                    <option value="Sabaragamuwa" <?php echo ($getRecord->state == 'Sabaragamuwa') ? 'selected' : ''; ?>>Sabaragamuwa</option>
                                                    <option value="Southern" <?php echo ($getRecord->state == 'Southern') ? 'selected' : ''; ?>>Southern</option>
                                                    <option value="Uva" <?php echo ($getRecord->state == 'Uva') ? 'selected' : ''; ?>>Uva</option>
                                                    <option value="Western" <?php echo ($getRecord->state == 'Western') ? 'selected' : ''; ?>>Western</option>
                                                </select>
                                            </div><!-- End .col-sm-6 -->

                                        </div><!-- End .row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Postcode / ZIP <span style="color: red;">*</span></label>
                                                <input type="text" name="postcode" value="{{ $getRecord->postcode }}" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Phone <span style="color: red;">*</span></label>
                                                <input type="tel" name="phone" value="{{ $getRecord->phone }}" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <div style="display: flex;justify-content: center;">
                                            <button type="submit" style="width: 100px;" class="btn btn-outline-primary-2 btn-order btn-block">
                                                UPDATE
                                            </button>
                                        </div>
                                    </form>

                                </div><!-- End .col-lg-9 -->
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