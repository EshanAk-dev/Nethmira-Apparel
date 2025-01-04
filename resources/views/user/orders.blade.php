@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ url('') }}/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Orders</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><strong>Order Number</strong></th> 
                                        <th><strong>Total Amount(Rs.)</strong></th>
                                        <th><strong>Payment Method</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Created Date</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->order_number }}</td>
                                        <td>{{ number_format($value->total_amount, 2) }}</td>
                                        <td style="text-transform: capitalize;">{{ $value->payment_method }}</td>
                                        <td>
                                            @if($value->status == 0)
                                            Pending
                                            @elseif($value->status == 1)
                                            In progress
                                            @elseif($value->status == 2)
                                            Delivered
                                            @elseif($value->status == 3)
                                            Completed
                                            @elseif($value->status == 4)
                                            Cancelled
                                            @endif
                                        </td>
                                        <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('user/orders/detail/'.$value->id) }}" class="btn btn-primary">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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