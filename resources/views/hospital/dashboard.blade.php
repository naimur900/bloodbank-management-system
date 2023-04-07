@extends('hospital.dashboard-layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Available Blood
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ array_sum($availableBloodUnits) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                            <i class="fas fa-2x text-gray-300 fa-database"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Saved Lives Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Saved Lives
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countSuccessRequests}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-heartbeat fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countPendingRequests}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        {{-- <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div> --}}

        <!-- Pie Chart -->
        <div class="col-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total Available Bloods</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    @if (array_sum($availableBloodUnits)<1) <div class="text-center ">
                        <h4 class="text-gray-500">
                            No data Available.
                        </h4>
                </div>
                @endif
                <div class="mt-4 text-center small">
                    <span class="mr-4">
                        <i class="fas fa-circle text-primary"></i> A+
                    </span>
                    <span class="mr-4">
                        <i class="fas fa-circle" style="color: rgb(210, 105, 30)"></i>A-
                    </span>
                    <span class="mr-4">
                        <i class="fas fa-circle text-danger"></i>B+
                    </span>
                    <span class="mr-4">
                        <i class="fas fa-circle text-warning"></i>B-
                    </span>
                    <span class="mr-4">
                        <i class="fas fa-circle" style="color: rgb(153, 50, 204)"></i>AB+
                    </span>
                    <span class="mr-4">
                        <i class="fas fa-circle" style="color: rgb(8, 253, 253)"></i>AB-
                    </span>
                    <span class="mr-4">
                        <i class="fas fa-circle text-success"></i>O+
                    </span>
                    <span class="mr-4">
                        <i class="fas fa-circle text-info"></i>O-
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@push('script')

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito',
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"],
        datasets: [{
            data: [
                "{{ $availableBloodUnits['A+'] }}",
                "{{ $availableBloodUnits['A-'] }}",
                "{{ $availableBloodUnits['B+'] }}",
                "{{ $availableBloodUnits['B-'] }}",
                "{{ $availableBloodUnits['AB+'] }}",
                "{{ $availableBloodUnits['AB-'] }}",
                "{{ $availableBloodUnits['O+'] }}",
                "{{ $availableBloodUnits['O-'] }}"
            ],
            backgroundColor: ['#4E73DF', '#D2691E', '#E74A3B', '#F6C23E', '#9932CC', '#00FFFF',
                '#1CC88A', '#36B9CC'
            ],
            hoverBackgroundColor: ['#3d60ca', '#b15716', '#be3529', '#ac8932', '#7d23aa', '#11d1d1',
                '#17a571', '#44919c',
            ],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 60,
    },
});
</script>
@endpush
@endsection