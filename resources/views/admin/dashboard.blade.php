@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Orders</span>
                <span class="info-box-number">{{ $TotalTodayOrder }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Orders</span>
                <span class="info-box-number">{{ $TotalOrder }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Payments</span>
                <span class="info-box-number">Rs.{{ number_format( $TotalTodayPayment, 2) }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Payments</span>
                <span class="info-box-number">Rs.{{ number_format( $TotalPayment, 2) }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Customers</span>
                <span class="info-box-number">{{ $TotalTodayCustomer }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Customers</span>
                <span class="info-box-number">{{ $TotalCustomer }}</span>
              </div>
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-lg-12">
            {{-- Chart one --}}
          <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Customers & Orders</h3>
                  <select class="form-control ChangeYear" style="width: 100px;" name="" id="">
                    @for($i=2023; $i<=date('Y'); $i++)
                      <option {{ ($year == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="sales-chart-order" height="250" style="display: block; height: 200px; width: 572px;" width="715" class="chartjs-render-monitor"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-warning"></i> Customers
                  </span>

                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Orders
                  </span>

                  {{-- <span>
                    <i class="fas fa-square text-success"></i> Amount
                  </span> --}}
                </div>
              </div>
            </div>

            {{-- Chart two --}}
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Payments</h3>
                  <select class="form-control ChangeYear" style="width: 100px;" name="" id="">
                    @for($i=2023; $i<=date('Y'); $i++)
                      <option {{ ($year == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">Rs.{{ number_format($totalAmount, 2) }}</span>
                    <span>Sales Over Time</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="sales-chart-payment" height="250" style="display: block; height: 200px; width: 572px;" width="715" class="chartjs-render-monitor"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-success"></i> Total Payments
                  </span>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Latest Orders</h3>
              </div>
              <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
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
                    <th>Total Amount(Rs.)</th>
                    <th>Payment Method</th>
                    <th>Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($getLatestOrders as $value)
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
                    <td>{{ number_format($value->total_amount, 2) }}</td>
                    <td style="text-transform: capitalize;">{{ $value->payment_method }}</td>
                    <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
</div>   

@endsection

@section('script')
<script src="{{ url('public/assets/dist/js/pages/dashboard3.js')}}"></script>

<script>
  //first chart

  $('.ChangeYear').change(function(){
    var year = $(this).val();
    window.location.href = "{{ url('admin/dashboard?year=') }}"+year;
  });

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart-order')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          backgroundColor: '#ffa500',
          borderColor: '#ffa500',
          data: [{{ $getTotalCustomerMonth }}]
        },
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [{{ $getTotalOrderMonth }}]
        },
        /*{
          backgroundColor: '#4CAF50',
          borderColor: '#4CAF50',
          data: [{{ $getTotalOrderAmountMonth }}]
        }*/
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return '' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
</script>
<script>
  //second chart
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart-payment')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          backgroundColor: '#4CAF50',
          borderColor: '#4CAF50',
          data: [{{ $getTotalOrderAmountMonth }}]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return 'Rs. ' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
</script>
@endsection