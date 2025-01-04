@extends('admin.layouts.app')
@section('style')
<style>
    .form-group {
        margin-bottom: 3px;
    }
</style>
@endsection
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1><i class="fas fa-eye"></i>&nbsp;&nbsp;Order Details</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="form-group">
                                <label>ID : &nbsp; <span style="font-weight: normal;">{{ $getRecord->id }}</span> </label>
                            </div>

                            <div class="form-group">
                                <label>Order Number : &nbsp; <span style="font-weight: normal;">{{ $getRecord->order_number }}</span> </label>
                            </div>

                            <div class="form-group">
                                <label>Name : &nbsp; <span style="font-weight: normal;">{{ $getRecord->first_name }} {{ $getRecord->last_name }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Country : &nbsp; <span style="font-weight: normal;">{{ $getRecord->country }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Address : &nbsp; <span style="font-weight: normal;">{{ $getRecord->address_one }} {{ $getRecord->address_two }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>City : &nbsp; <span style="font-weight: normal;">{{ $getRecord->city }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Province : &nbsp; <span style="font-weight: normal;">{{ $getRecord->state }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Postcode : &nbsp; <span style="font-weight: normal;">{{ $getRecord->postcode }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Phone : &nbsp; <span style="font-weight: normal;">{{ $getRecord->phone }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Email : &nbsp; <span style="font-weight: normal;">{{ $getRecord->email }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Discount Code : &nbsp; <span style="font-weight: normal;">{{ $getRecord->discount_code }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Discount Amount : &nbsp; <span style="font-weight: normal;">Rs.{{ number_format($getRecord->discount_amount, 2)  }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Shipping Method : &nbsp; <span style="font-weight: normal;">{{ $getRecord->getShipping->name }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Shipping Amount : &nbsp; <span style="font-weight: normal;">Rs.{{ number_format($getRecord->shipping_amount, 2)  }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Total Amount : &nbsp; <span style="font-weight: normal;">Rs.{{ number_format($getRecord->total_amount, 2)  }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Payment Method : &nbsp; <span style="font-weight: normal;text-transform: capitalize;">{{ $getRecord->payment_method }}</span></label>
                            </div>

                            <div class="form-group">
                                @if($getRecord->status == 0)
                                <label>Status : &nbsp; <span style="font-weight: normal;">Pending</span></label>
                                @elseif($getRecord->status == 1)
                                <label>Status : &nbsp; <span style="font-weight: normal;">In progress</span></label>
                                @elseif($getRecord->status == 2)
                                <label>Status : &nbsp; <span style="font-weight: normal;">Delivered</span></label>
                                @elseif($getRecord->status == 3)
                                <label>Status : &nbsp; <span style="font-weight: normal;">Completed</span></label>
                                @elseif($getRecord->status == 4)
                                <label>Status : &nbsp; <span style="font-weight: normal;">Cancelled</span></label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Notes : &nbsp; <span style="font-weight: normal;">{{ $getRecord->notes }}</span></label>
                            </div>

                            <div class="form-group">
                                <label>Created Date : &nbsp; <span style="font-weight: normal;">{{ date('d-m-Y h:i A', strtotime($getRecord->created_at)) }}</span></label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; Order Product Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Size Amount(Rs.)</th>
                                <th>Total Amount(Rs.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord->getItem as $item)
                            @php
                            $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id);
                            @endphp
                            <tr>
                                <td>
                                    <img style="width: 100px;height: 100px;" src="{{ $getProductImage->getProductImage() }}">
                                </td>
                                <td>
                                    <a target="_blank" href="{{ url($item->getProduct->slug) }}">{{ $item->getProduct->title }}</a>
                                    <br>
                                    Size: {{ $item->size_name }} <br />
                                    Color: {{ $item->color_name }} <br />
                                </td>
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
            <!-- /.card -->
    </section>
</div>

@endsection

@section('script')
@endsection