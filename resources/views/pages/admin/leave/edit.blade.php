@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Leave</h1>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{route('leave.update', $item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        {{-- <label for="id_employee">Employee ID</label> --}}
                        <input type="string" class="form-control" name="id_employee" placeholder="ID Employee" value="{{$item->id_employee}}" hidden>
                    </div>
                    <div class="form-group">
                        <label for="leave_date">Leave Date</label>
                        <input type="date" class="form-control" name="leave_date" placeholder="Leave Date" value="{{$item->leave_date}}">
                    </div>
                    <div class="form-group">
                        <label for="leave_period">Leave Period</label>
                        <input type="number" class="form-control" name="leave_period" placeholder="Leave Period" value="{{$item->leave_period}}">
                    </div>
                    <div class="form-group">
                        <label for="reason">Leave Reason</label>
                        <textarea name="reason" rows="10" class="d-block w-100 form-control">{{$item->reason}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Update
                    </button>
                </form>
            </div>
        </div>

        {{-- <div class="row">
            <div class="card-body">

            </div>
        </div> --}}

    </div>
    <!-- /.container-fluid -->

@endsection
