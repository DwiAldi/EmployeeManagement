@extends('layouts.admin')

@section('content')
    <!-- Begin Card Section -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Employee</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_employee}}</div>
                            </div>
                            <div class="col-auto">

                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Leave Transaction</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_leave}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-plane-departure fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Leave Request</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_leave}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Section -->

    <!-- Begin Report Section -->
    <div class="container-fluid">
        <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Report : Top 3 Karyawan yang pertama kali bergabung
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width = "100%" cellspacing = "0" >
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Birth Date</th>
                                    <th>Joined Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($report_1 as $item1)
                                    <tr>
                                        <td>{{ $item1->id_employee }}</td>
                                        <td>{{ $item1->name }}</td>
                                        <td>{{ $item1->address }}</td>
                                        <td>{{ $item1->birth_date }}</td>
                                        <td>{{ $item1->join_date }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Data is Empty
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Report : Daftar karyawan yang sudah pernah mengambil cuti
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width = "100%" cellspacing = "0" >
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Leave Date</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($report_2 as $item2)
                                    <tr>
                                        <td>{{ $item2->id_employee }}</td>
                                        <td>{{ $item2->name }}</td>
                                        <td>{{ $item2->leave_date }}</td>
                                        <td>{{ $item2->reason }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Data is Empty
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Report : Daftar karyawan yang saat ini pernah mengambil cuti lebih dari 1x
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width = "100%" cellspacing = "0" >
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Leave Date</th>
                                    <th>Leave Period</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($report_3 as $item3)
                                    <tr>
                                        <td>{{ $item3->id_employee }}</td>
                                        <td>{{ $item3->name }}</td>
                                        <td>{{ $item3->leave_date }}</td>
                                        <td>{{ $item3->leave_period }}</td>
                                        <td>{{ $item3->reason }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Data is Empty
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingFour">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Report : Sisa Cuti Karyawan
                </button>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width = "100%" cellspacing = "0" >
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Leave Quota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($report_4 as $item4)
                                <tr>
                                    <td>{{ $item4->id_employee }}</td>
                                    <td>{{ $item4->name }}</td>
                                    <td>{{ $item4->leave_quota }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data is Empty
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- End Report Section -->

@endsection
