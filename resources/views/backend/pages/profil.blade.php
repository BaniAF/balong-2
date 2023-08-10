@section('title')
   PROFIL - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')

@section('content')
<style>
    .form-label{
        color:black;
        font-weight:semibold;
        font-size:15px;
    }
</style>
    @include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Pages /</span> Profil</h6>
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
    <!-- Card Tugas dan Fungsi -->
    <div class="card mb-4">
        <div class="card-header p-4 pb-0">
            <h5 class="fw-semibold">Tugas dan Fungsi</h5>
            <hr>
        </div>
        <div class="card-body">
        </div>
    </div>

    <!-- Card Visi Misi -->
    <div class="card mb-4">
        <div class="card-header p-4 pb-0">
            <h5 class="fw-semibold">Visi & Misi, Tujuan, dan Sasaran</h5>
            <hr>
        </div>
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Visi</label>
                    <textarea name="visi" id="visi" cols="5" rows="3" class="form-control editor"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Misi</label>
                    <textarea name="misi" id="misi" cols="5" rows="3" class="form-control editor"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tujuan</label>
                    <textarea name="tujuan" id="tujuan" cols="5" rows="3" class="form-control editor"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Sasaran</label>
                    <textarea name="sasaran" id="sasaran" cols="5" rows="3" class="form-control editor"></textarea>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Card Strukur Organisasi -->
    <div class="card mb-4">
        <div class="card-header p-4 pb-0">
            <h5 class="fw-semibold">Struktur Organisasi</h5>
            <hr>
        </div>
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Upload File</label>
                    <!-- <label for="imageUpload" class="form-label mt-2">Upload Foto</label> -->
                    <input type="file" id="ImageUpload" name="fotoPost" accept=".png, .jpg, .jpeg" class="d-none" />
                    <label for="ImageUpload" class="btn btn-primary mt-2 mb-2 btn-md w-100">Pilih Foto</label>
                    <span class="text-danger text-capitalize fw-semibold mt-2">* max 2 mb</span> <br>
                    <label class="form-label mt-4">Keterangan</label>
                    <textarea name="keteranganGambar" id="keteranganGambar" cols="5" rows="3" class="form-control editor"></textarea>
                    <span class="text-danger text-capitalize fw-semibold mt-2">* Opsional</span>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Preview</label>
                    <div class="previewFile">
                        <img id="ImagePreview" src="{{ asset('images/dummy.jpg') }}" class="img-fluid" style="max-height: 450px;">
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Card -->
    <script>
        document.querySelectorAll('.editor').forEach(editorTextarea => {
            ClassicEditor
                .create(editorTextarea, {
                    ckfinder: {
                        uploadUrl: '{{ route('image.upload') }}?_token={{ csrf_token() }}',
                    }
                })
                .then(editor => {
                    // Set data dari textarea ke CKEditor
                    editor.setData(editorTextarea.value);
                })
                .catch(error => {
                    console.error(error);
                });
        });
        // Fungsi untuk menampilkan preview gambar saat dipilih
        function showImagePreview(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                const previewElement = document.getElementById('ImagePreview');
                previewElement.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

            // Tambahkan event listener untuk input file
        const imageUploadInput = document.getElementById('ImageUpload');
        imageUploadInput.addEventListener('change', function () {
            showImagePreview(this);
        });

    </script>
@endsection
