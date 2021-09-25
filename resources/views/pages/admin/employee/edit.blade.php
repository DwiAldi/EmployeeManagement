@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Employee : {{ $item->id_employee }} - {{ $item->name }}</h1>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{route('employee.update', $item->id_employee)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$item->name}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" rows="10" class="d-block w-100 form-control">{{$item->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth Date</label>
                        <input type="date" class="form-control" name="birth_date" placeholder="Birth_Date" value="{{$item->birth_date}}">
                    </div>
                    <div class="form-group">
                        <label for="join_date">Joined Date</label>
                        <input type="date" class="form-control" name="join_date" placeholder="Join_Date" value="{{$item->join_date}}">
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
