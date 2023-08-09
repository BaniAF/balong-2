@section('title')
    TAMBAH FOTO - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')
@section('content')
@include('sweetalert::alert')
<h6 class="fw-bold mb-4"><span class="text-muted fw-light">Galeri /</span> Tambah Foto</h6>
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
<!-- Tampilan Edit Berita -->
<div class="card">
    <div class="card-body">
        <div class="card-title d-flex align-items-center justify-content-between">
            <h5 class="fw-semibold">Tambah Foto Kegiatan</h5>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ route('tambah-foto-kegiatan') }}">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="dobBackdrop" class="form-label">Program Kerja</label>
                    <select name="proker" id="proker" class="form-control mb-2">
                        <option value="">-- Pilih Program Kegiatan --</option>
                        @foreach($prokerja as $data)
                            <option value="{{$data->id}}">{{$data->namaProker}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8 d-flex align-items-end mb-2">
                    <label for="ImageUpload" class="btn btn-primary">Tambah Foto</label>
                    <input type="file" id="ImageUpload" name="fotoPost[]" accept=".png, .jpg, .jpeg" multiple class="d-none"/>
                </div>
            </div>
            <div class="mt-2 ms-0 d-flex flex-wrap" id="ImagePreviews">
                <!-- Uploaded image previews will be displayed here -->
            </div>
            <div class="mt-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2" name="submitType" value="simpan">Simpan</button>
                <button type="button" class="btn btn-danger" name="submitType" onclick="goBack()">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
    // JavaScript code
    var uploadedImages = [];

    document.getElementById("ImageUpload").addEventListener("change", function () {
        var files = document.getElementById("ImageUpload").files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (!isImageUploaded(file)) {
                createImagePreview(file);
                uploadedImages.push(file);
            }
        }
    });

    function createImagePreview(file) {
        var previewContainer = document.getElementById("ImagePreviews");
        var imgContainer = document.createElement("div");
        imgContainer.className = "position-relative m-2"; // To position the close icon

        var img = document.createElement("img");
        img.src = URL.createObjectURL(file);
        img.className = "img-fluid";
        img.style.maxHeight = "250px";
        imgContainer.appendChild(img);

        var closeIcon = document.createElement("span");
        closeIcon.className = "position-absolute top-0 end-0 bg-danger text-white fw-semibold cursor-pointer";
        closeIcon.innerHTML = "<i class='bx bx-x'></i>";
        closeIcon.addEventListener("click", function () {
            removeImageFromPreview(imgContainer, file);
        });

        imgContainer.appendChild(closeIcon);
        previewContainer.appendChild(imgContainer);
    }

    function isImageUploaded(file) {
        for (var i = 0; i < uploadedImages.length; i++) {
            if (file.name === uploadedImages[i].name && file.size === uploadedImages[i].size) {
                return true;
            }
        }
        return false;
    }

    function removeImageFromPreview(imgContainer, file) {
        imgContainer.remove();
        var index = uploadedImages.indexOf(file);
        if (index !== -1) {
            uploadedImages.splice(index, 1);
        }
    }

    function goBack() {
        window.history.back();
    }
</script>

@endsection