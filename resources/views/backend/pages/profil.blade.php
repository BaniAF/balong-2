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
    {{-- @foreach ($profiles as $item) --}}
        
    <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><i class="tf-icons bx bx-home me-2"></i> Organisasi dan Tata Kerja </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-visi" aria-controls="navs-justified-visi" aria-selected="false"><i class="tf-icons bx bx-user me-2"></i> Tugas Dan Fungsi </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-tujuan" aria-controls="navs-justified-tujuan" aria-selected="false"><i class="tf-icons bx bx-message-square me-2"></i> Visi, Misi, Sasaran dan Tujuan </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-struktur" aria-controls="navs-justified-struktur" aria-selected="false"><i class="tf-icons bx bx-message-square me-2"></i> Struktur Organisasi </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                <form class="row g-3" action="{{ route('profil.edit', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-5">
                        <label class="form-label">Upload File</label>
                        <input type="file" id="fileUploadOrg" name="fileOrg" accept=".pdf" class="d-none"/>
                        <label for="fileUploadOrg" class="btn btn-primary mt-2 mb-2 btn-md w-100">Pilih File</label>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* max 2 mb</span> <br>
                        <label class="form-label mt-4">Keterangan</label>
                        <textarea name="ketOrg" id="ketOrg" cols="5" rows="3" class="form-control editor"></textarea>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* Opsional</span>
                    </div>
                    <div class="col-md-7">
                        <label class="form-label">Preview File</label>
                        @if ($profiles[0]->fileProfil)
                            <iframe id="pdfIframeOrg" src="{{ asset('uploads/File/' . $profiles[0]->fileProfil) }}" frameborder="0" width="100%" height="600px"></iframe>
                        @else
                            <iframe id="pdfIframeOrg" src="" frameborder="0" width="100%" height="600px"></iframe>
                        @endif
                        {{-- <iframe id="pdfIframeOrg" src="" frameborder="0" width="100%" height="600px"></iframe> --}}
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="organisasi">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="navs-justified-visi" role="tabpanel">
                <form class="row g-3" action="{{ route('profil.edit', 2) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-5">
                        <label class="form-label">Upload File</label>
                        <input type="file" id="fileUploadTugas" name="fileTugas" accept=".pdf" class="d-none"/>
                        <label for="fileUploadTugas" class="btn btn-primary mt-2 mb-2 btn-md w-100">Pilih File</label>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* max 2 mb</span> <br>
                        <label class="form-label mt-4">Keterangan</label>
                        <textarea name="ketTugas" id="ketTugas" cols="5" rows="3" class="form-control editor"></textarea>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* Opsional</span>
                    </div>
                    <div class="col-md-7">
                        <label class="form-label">Preview File</label>
                        @if ($profiles[1]->fileProfil)
                            <iframe id="pdfIframeTugas" src="{{ asset('uploads/File/' . $profiles[1]->fileProfil) }}" frameborder="0" width="100%" height="600px"></iframe>
                        @else
                            <iframe id="pdfIframeTugas" src="" frameborder="0" width="100%" height="600px"></iframe>
                        @endif
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="tugas">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="navs-justified-tujuan" role="tabpanel">
                <form class="row g-3" action="{{ route('profil.edit', 4) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-5">
                        <label class="form-label">Upload File</label>
                        <input type="file" id="fileUploadVisiMisi" name="fileVisiMisi" accept=".pdf" class="d-none"/>
                        <label for="fileUploadVisiMisi" class="btn btn-primary mt-2 mb-2 btn-md w-100">Pilih File</label>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* max 2 mb</span> <br>
                        <label class="form-label mt-4">Keterangan</label>
                        <textarea name="ketVisiMisi" id="ketVisiMisi" cols="5" rows="3" class="form-control editor"></textarea>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* Opsional</span>
                    </div>
                    <div class="col-md-7">
                        <label class="form-label">Preview File</label>
                        @if ($profiles[3]->fileProfil)
                            <iframe id="pdfIframeVisiMisi" src="{{ asset('uploads/File/' . $profiles[3]->fileProfil) }}" frameborder="0" width="100%" height="600px"></iframe>
                        @else
                            <iframe id="pdfIframeVisiMisi" src="" frameborder="0" width="100%" height="600px"></iframe>
                        @endif
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="visiMisi">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="navs-justified-struktur" role="tabpanel">
                <form class="row g-3" action="{{ route('profil.edit', 3) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-5">
                        <label class="form-label">Upload File</label>
                        <!-- <label for="imageUpload" class="form-label mt-2">Upload Foto</label> -->
                        <input type="file" id="fileUploadStruktur" name="fileStruktur" accept=".pdf" class="d-none"/>
                        <label for="fileUploadStruktur" class="btn btn-primary mt-2 mb-2 btn-md w-100">Pilih File</label>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* max 2 mb</span> <br>
                        <label class="form-label mt-4">Keterangan</label>
                        <textarea name="ketStruktur" id="ketStruktur" cols="5" rows="3" class="form-control editor"></textarea>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* Opsional</span>
                    </div>
                    <div class="col-md-7">
                        <label class="form-label">Preview File</label>
                        @if ($profiles[2]->fileProfil)
                            <iframe id="pdfIframeStruktur" src="{{ asset('uploads/File/' . $profiles[2]->fileProfil) }}" frameborder="0" width="100%" height="600px"></iframe>
                        @else
                            <iframe id="pdfIframeStruktur" src="" frameborder="0" width="100%" height="600px"></iframe>
                        @endif
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="struktur">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
{{-- hasil  tabel--}}
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
                    // Mengambil ID textarea yang terkait dengan editor saat ini
                    const textareaId = editorTextarea.getAttribute('id');
                    // Menggunakan JSON untuk menyimpan konten dari Profil sesuai ID textarea
                    const profileContent = {!! $profiles->toJson() !!};
                    let content = '';

                    // Loop melalui profileContent untuk menemukan konten yang sesuai berdasarkan textareaId
                    profileContent.forEach(item => {
                        switch (textareaId) {
                            case 'ketOrg':
                                if (item.id === 1) { // ID untuk Tugas pada profil
                                    content = item.descProfil;
                                }
                                break;
                            case 'ketTugas':
                                if (item.id === 2) { // ID untuk Tugas pada profil
                                    content = item.descProfil;
                                }
                                break;
                            case 'ketVisiMisi':
                                if (item.id === 4) { // ID untuk Visi Misi pada profil
                                    content = item.descProfil;
                                }
                                break;
                            case 'ketStruktur':
                                if (item.id === 3) { // ID untuk Struktur pada profil
                                    content = item.descProfil;
                                }
                                break;
                            // Tambahkan kasus lain jika ada lebih banyak textarea
                            default:
                                content = '';
                                break;
                        }
                    });
                    // Set data dari variabel content ke CKEditor
                    editor.setData(content);
                })
                .catch(error => {
                    console.error(error);
                });
        });

        // Fungsi untuk menampilkan preview gambar saat dipilih
        function showPDFPreview(input, iframeId) {
            var iframe = document.getElementById(iframeId);
            var file = input.files[0];

            if (file) {
                var objectURL = URL.createObjectURL(file);
                iframe.src = objectURL;
            } else {
                iframe.src = "";
            }
        }

        // Mengambil referensi elemen input file dan menambahkan event listener untuk form struktur
        var fileUploadStruktur = document.getElementById('fileUploadStruktur');
        fileUploadStruktur.addEventListener('change', function() {
            showPDFPreview(this, 'pdfIframeStruktur');
        });

        // Mengambil referensi elemen input file dan menambahkan event listener untuk form Visi Misi
        var fileUploadRegulasi = document.getElementById('fileUploadTugas');
        fileUploadRegulasi.addEventListener('change', function() {
            showPDFPreview(this, 'pdfIframeTugas');
        });        

        // Mengambil referensi elemen input file dan menambahkan event listener untuk form regulasi
        var fileUploadRegulasi = document.getElementById('fileUploadOrg');
        fileUploadRegulasi.addEventListener('change', function() {
            showPDFPreview(this, 'pdfIframeOrg');
        });

        // Mengambil referensi elemen input file dan menambahkan event listener untuk form regulasi
        var fileUploadRegulasi = document.getElementById('fileUploadVisiMisi');
        fileUploadRegulasi.addEventListener('change', function() {
            showPDFPreview(this, 'pdfIframeVisiMisi');
        });
    </script>
@endsection
