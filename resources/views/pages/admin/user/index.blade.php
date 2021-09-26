@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Management</h1>
            <a href="{{route('leave.create')}}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-whte-50">Create New User</i>
            </a>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width = "100%" cellspacing = "0" >
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Leave Date</th>
                                <th>Leave Period</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id_employee }}</td>
                                    <td>{{ $item->employee->name }}</td>
                                    <td>{{ $item->employee->address }}</td>
                                    <td>{{ $item->leave_date }}</td>
                                    <td>{{ $item->leave_period }} Days / {{ $item->leave_period*8}} Work Hour</td>
                                    <td>{{ $item->reason }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{route('leave.edit', $item->id)}}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{route('leave.destroy', $item->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
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
    <!-- /.container-fluid -->

@endsection
