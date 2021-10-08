@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p> --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>


    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data {{ $title }}</h6>
        </div>
        <div class="card-header py-3 row">
            <a class="btn btn-success mr-2" href="/employees/create">
                <i class="fa fa-plus fa-fw"></i> Add Employee
            </a>
            <div class="col-lg-2">
                <form action="/employees/detail" method="get">
                    {{-- @csrf --}}
                    <select class="form-select form-control" name="company_id">
                        @foreach ($companies as $company)
                            @if (old('company_id') == $company->id)
                                <option value="{{ $company->id }}" selected>a{{ $company->name }}</option>
                            @else
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endif

                        @endforeach
                    </select>
            </div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
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
                                    {{-- <a href="/dashboard/posts/{{ $employee->id }}" class="btn bg-info text-light"><i
                                            class="far fa-eye"></i></a> --}}
                                    <a href="/employees/{{ $employee->id }}/edit" class="btn bg-warning text-light"><i
                                            class="far fa-edit"></i></a>
                                    <form action="/employees/{{ $employee->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn bg-danger text-light"
                                            onclick="return confirm('are you sure?')"><i
                                                class="fas fa-times"></i></button>
                                    </form>
                                    {{-- <a href="#" class="btn bg-danger text-light"><i class="fas fa-times"></i></a> --}}
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
