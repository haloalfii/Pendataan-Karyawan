@extends('company.layout-company.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New company</h1>
    </div>
    <div class="col-lg-5">
        <form method="POST" action="/companies/{{ $companies->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text"
                    class="form-control @error('name')
                    is-invalid
                @enderror" id="name"
                    name="name" autofocus value="{{ old('name', $companies->name) }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                @if ($companies->image)
                    <img src="{{ asset('storage/' . $companies->image) }}"
                        class="img-priview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-priview img-fluid mb-3 col-sm-5">
                @endif

                <input class="form-control @error('image')
                    is-invalid
                @enderror"
                    type="file" id="image" name="image" onchange="priviewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Edit Company</button>
        </form>
    </div>

    <script>
        function priviewImage() {
            const image = document.querySelector('#image');
            const imgPriview = document.querySelector('.img-priview');

            imgPriview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPriview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
