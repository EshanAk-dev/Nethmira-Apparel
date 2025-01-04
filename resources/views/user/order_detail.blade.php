@extends('layouts.app')
@section('style')
<style>
    .form-group {
        margin-bottom: 3px;
    }
</style>
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ url('') }}/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Order Details</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
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

                                <div class="form-group">
                                    <label><b>Order Number :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->order_number }}</span> </label>
                                </div>

                                <div class="form-group">
                                    <label><b>Name :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->first_name }} {{ $getRecord->last_name }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Country :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->country }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Address :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->address_one }} {{ $getRecord->address_two }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>City :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->city }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Province :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->state }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Postcode :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->postcode }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Phone :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->phone }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Email :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->email }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Discount Code :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->discount_code }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Discount Amount :</b> &nbsp; <span style="font-weight: normal;">Rs.{{ number_format($getRecord->discount_amount, 2)  }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Shipping Method :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->getShipping->name }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Shipping Amount :</b> &nbsp; <span style="font-weight: normal;">Rs.{{ number_format($getRecord->shipping_amount, 2)  }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Total Amount :</b> &nbsp; <span style="font-weight: normal;">Rs.{{ number_format($getRecord->total_amount, 2)  }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Payment Method :</b> &nbsp; <span style="font-weight: normal;text-transform: capitalize;">{{ $getRecord->payment_method }}</span></label>
                                </div>

                                <div class="form-group">
                                    @if($getRecord->status == 0)
                                    <label><b>Status :</b> &nbsp; <span style="font-weight: normal;">Pending</span></label>
                                    @elseif($getRecord->status == 1)
                                    <label><b>Status :</b> &nbsp; <span style="font-weight: normal;">In progress</span></label>
                                    @elseif($getRecord->status == 2)
                                    <label><b>Status :</b> &nbsp; <span style="font-weight: normal;">Delivered</span></label>
                                    @elseif($getRecord->status == 3)
                                    <label><b>Status :</b> &nbsp; <span style="font-weight: normal;">Completed</span></label>
                                    @elseif($getRecord->status == 4)
                                    <label><b>Status :</b> &nbsp; <span style="font-weight: normal;">Cancelled</span></label>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label><b>Notes :</b> &nbsp; <span style="font-weight: normal;">{{ $getRecord->notes }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label><b>Created Date :</b> &nbsp; <span style="font-weight: normal;">{{ date('d-m-Y h:i A', strtotime($getRecord->created_at)) }}</span></label>
                                </div>

                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-top: 20px;margin-bottom: 10px;"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; Order Product Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="overflow: auto;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><strong>Image</strong></th>
                                                <th><strong>Product Name</strong></th>
                                                <th><strong>Qty</strong></th>
                                                <th><strong>Price</strong></th>
                                                <th><strong>Size Amount(Rs.)</strong></th>
                                                <th><strong>Total Amount(Rs.)</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getRecord->getItem as $item)
                                            @php
                                            $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <img style="width: 110px;height: 110px;" src="{{ $getProductImage->getProductImage() }}">
                                                </td>
                                                <td>
                                                    <a target="_blank" href="{{ url($item->getProduct->slug) }}"><strong>{{ $item->getProduct->title }}</strong></a>
                                                    <br>
                                                    <strong>Size:</strong> {{ $item->size_name }} <br />
                                                    <strong>Color:</strong> {{ $item->color_name }} <br />
                                                </td>

                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                                
                                                <td>{{ number_format($item->size_amount, 2) }}</td>
                                                <td>{{ number_format($item->total_price, 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
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