@extends('layouts.app')
@section('style')
<style>
    .box-btn {
        padding: 10px;text-align: center;border-radius: 5px;box-shadow: 0 0 1px rgba(0, 0, 0, 125),0 1px 3px rgba(0, 0, 0, 2);
    }
</style>
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ url('') }}/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Dashboard</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                            <div class="row">
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px;font-weight: bold;">{{ $TotalOrder }}</div>
                                        <div style="font-size: 16px;">Total Orders</div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px;font-weight: bold;">{{ $TotalTodayOrder }}</div>
                                        <div style="font-size: 16px;">Today Orders</div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px;font-weight: bold;">Rs.{{ number_format($TotalPayment, 2) }}</div>
                                        <div style="font-size: 16px;">Total Payments</div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px;font-weight: bold;">Rs.{{ number_format($TotalTodayPayment, 2) }}</div>
                                        <div style="font-size: 16px;">Today Payments</div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px;font-weight: bold;">{{ $TotalPending }}</div>
                                        <div style="font-size: 16px;">Pending Orders</div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px;font-weight: bold;">{{ $TotalInprogress }}</div>
                                        <div style="font-size: 16px;">In Progress Orders</div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px;font-weight: bold;">{{ $TotalCompleted }}</div>
                                        <div style="font-size: 16px;">Completed Orders</div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px;font-weight: bold;">{{ $TotalCancelled }}</div>
                                        <div style="font-size: 16px;">Cancelled Orders</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
@section('script')

@endsection