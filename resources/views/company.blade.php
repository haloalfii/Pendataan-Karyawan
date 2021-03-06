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
        <div class="card-header py-3">
            <a class="btn btn-success" href="/companies/create">
                <i class="fa fa-plus fa-fw"></i> Add Company
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Company Name</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $key => $company)
                            <tr>
                                <td>{{ $companies->firstItem() + $key }}</td>
                                <td>{{ $company->name }}</td>
                                <td><img src="{{ asset('storage/' . $company->image) }}" class="rounded img-size" alt="">
                                </td>
                                <td>
                                    {{-- <a href="/dashboard/posts/{{ $company->id }}" class="btn bg-info text-light"><i
                                            class="far fa-eye"></i></a> --}}
                                    <a href="/companies/{{ $company->id }}/edit" class="btn bg-warning text-light"><i
                                            class="far fa-edit"></i></a>
                                    <form action="/companies/{{ $company->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn bg-danger text-light"
                                            onclick="return confirm('are you sure?')"><i
                                                class="fas fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $companies->links() }}
            </div>
        </div>
    </div>
@endsection
