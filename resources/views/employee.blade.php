@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data {{ $title }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $key => $employee)
                            <tr>
                                <td>{{ $employees->firstItem() + $key }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>
                                    <a href="/dashboard/posts/{{ $employee->id }}" class="btn bg-info text-light"><i
                                            class="far fa-eye"></i></a>
                                    <a href="#" class="btn bg-warning text-light"><i class="far fa-edit"></i></a>
                                    <a href="#" class="btn bg-danger text-light"><i class="fas fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection
