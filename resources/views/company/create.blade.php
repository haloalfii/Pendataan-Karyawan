@extends('company.layout-company.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New company</h1>
    </div>
    <div class="col-lg-5">
        <form method="POST" action="/companies" class="mb-5" enctype="multipart/form-data">
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
                <label for="image" class="form-label">Post Image</label>
                <img class="img-priview img-fluid mb-3 col-sm-5">
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
            <button type="submit" class="btn btn-primary">Add Company</button>
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
