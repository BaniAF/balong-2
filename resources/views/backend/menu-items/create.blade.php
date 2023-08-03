@section('title')
    MENU - KECAMATAN BALONG
@endsection
@extends('admin.layout.master')

@section('content')
    @include('sweetalert::alert')
    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Error",
                text: "Data Invalid!",
                icon: "error",
                button: "OK"
            });
        </script>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-center justify-content-between">
                <h5 class="fw-semibold">Daftar Postingan</h5>
                {{-- <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#backDropModal" type="button">
                    <i class='bx bxs-file-plus me-2'></i>Tambah Postingan
                </button> --}}
    {{-- </div>
    <div>
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Menu</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Menu" required>
            </div>
            <div class="form-group">
                <label for="status">Status Menu</label>
                <select class="form-control" id="exampleFormControlSelect1" name="status" required>
                    <option>Enable</option>
                    <option>Disable</option>
                </select>
            </div>
            <div class="form-group">
                <label for="link">Link Menu</label>
                <input type="text" name="link" class="form-control" placeholder="Enter your menu link" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
    </div> --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Menu Item</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('menuitem.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Item Name</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="enable">Enable</option>
                                    <option value="disable">Disable</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="link">Menu Link (optional)</label>
                                <input type="text" name="link" id="link" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
