@extends('employee.layout-employee.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Employee</h1>
    </div>

    <div class="col-lg-5">
        <form method="POST" action="/employees" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text"
                    class="form-control @error('name')
                    is-invalid
                @enderror" id="name"
                    name="name" autofocus value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <select class="form-select form-control" name="company_id">
                    @foreach ($companies as $company)
                        @if (old('company_id') == $company->id)
                            <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                        @else
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endif

                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                    class="form-control @error('email')
                    is-invalid
                @enderror" id="email"
                    name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
