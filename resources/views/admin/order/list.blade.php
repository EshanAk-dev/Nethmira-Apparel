@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><i class="fas fa-truck-fast"></i>&nbsp;&nbsp;Orders List &nbsp; <span style="color: blue;">( Total : {{ $getRecord->total() }})</span></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">

          @include('admin.layouts._message')

          <form method="get">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;Order Search</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Order Number</label>
                      <input type="text" name="order_number" placeholder="Order Number" class="form-control" value="{{ Request::get('order_number') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{ Request::get('first_name') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{ Request::get('last_name') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" placeholder="Email" class="form-control" value="{{ Request::get('email') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Country</label>
                      <input type="text" name="country" placeholder="Country" class="form-control" value="{{ Request::get('country') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>State</label>
                      <input type="text" name="state" placeholder="State" class="form-control" value="{{ Request::get('state') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" name="city" placeholder="City" class="form-control" value="{{ Request::get('city') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Postcode</label>
                      <input type="text" name="postcode" placeholder="Postcode" class="form-control" value="{{ Request::get('postcode') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>From Date</label>
                      <input type="date" style="padding: 6px;" name="from_date" class="form-control" value="{{ Request::get('from_date') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>To Date</label>
                      <input type="date" style="padding: 6px;" name="to_date" class="form-control" value="{{ Request::get('to_date') }}">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary">Search</button>
                        <a href="{{ url('admin/orders/list') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

          </form>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Orders List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Order Number</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Postcode</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Notes</th>
                    <th>Discount Code</th>
                    <th>Discount Amount(Rs.)</th>
                    <th>Shipping Amount(Rs.)</th>
                    <th>Total Amount(Rs.)</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{ $value->id }}</td>
                    <td>
                      <a href="{{ url('admin/orders/detail/'.$value->id) }}" class="btn btn-primary">
                        <i class="fas fa-eye"></i>Details
                      </a>
                    </td>
                    <td>{{ $value->order_number }}</td>
                    <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                    <td>{{ $value->country }}</td>
                    <td>{{ $value->address_one }} {{ $value->address_two }}</td>
                    <td>{{ $value->city }}</td>
                    <td>{{ $value->state }}</td>
                    <td>{{ $value->postcode }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->notes }}</td>
                    <td>{{ $value->discount_code }}</td>
                    <td>{{ number_format($value->discount_amount, 2) }}</td>
                    <td>{{ number_format($value->shipping_amount, 2) }}</td>
                    <td>{{ number_format($value->total_amount, 2) }}</td>
                    <td style="text-transform: capitalize;">{{ $value->payment_method }}</td>
                    <td>
                      <select class="form-control ChangeStatus" id="{{ $value->id }}" style="width: 135px;">
                        <option {{ ($value->status == 0) ? 'selected' : '' }} value="0">Pending</option>
                        <option {{ ($value->status == 1) ? 'selected' : '' }} value="1">Inprogress</option>
                        <option {{ ($value->status == 2) ? 'selected' : '' }} value="2">Delivered</option>
                        <option {{ ($value->status == 3) ? 'selected' : '' }} value="3">Completed</option>
                        <option {{ ($value->status == 4) ? 'selected' : '' }} value="4">Cancelled</option>
                      </select>
                    </td>
                    <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div style="padding: 10px; float: right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))
                  ->links() !!}
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

    </div>
  </section>
</div>

@endsection

@section('script')
<script>
  $('body').delegate('.ChangeStatus', 'change', function(){
    var status = $(this).val();
    var order_id = $(this).attr('id');
    $.ajax({
				type : "GET",
				url : "{{ url('admin/order_status') }}",
				data : {
          status : status,
          order_id : order_id
        },
				dataType : "json",
				success: function(data){
					alert(data.message);
				}
			});
  });
</script>
@endsection