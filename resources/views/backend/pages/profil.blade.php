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
    @foreach ($profiles as $item)
        
    <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><i class="tf-icons bx bx-home me-2"></i> Tugas dan Fungsi </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-visi" aria-controls="navs-justified-visi" aria-selected="false"><i class="tf-icons bx bx-user me-2"></i> Visi Misi </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-tujuan" aria-controls="navs-justified-tujuan" aria-selected="false"><i class="tf-icons bx bx-message-square me-2"></i> Sasaran dan Tujuan </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-struktur" aria-controls="navs-justified-struktur" aria-selected="false"><i class="tf-icons bx bx-message-square me-2"></i> Struktur Organisasi </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                Ini Nanti Untuk Tugas dan Fungsi
            </div>
            <div class="tab-pane fade" id="navs-justified-visi" role="tabpanel">
                <form class="row g-3" action="{{ route('profil.edit', $item->id) }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Visi</label>
                        <textarea name="visi" id="visi" cols="5" rows="3" class="form-control editor"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Misi</label>
                        <textarea name="misi" id="misi" cols="5" rows="3" class="form-control editor"></textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="visimisi">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="navs-justified-tujuan" role="tabpanel">
                <form class="row g-3" action="{{ route('profil.edit', $item->id) }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Tujuan</label>
                        <textarea name="tujuanP" id="tujuan" cols="5" rows="3" class="form-control editor"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sasaran</label>
                        <textarea name="sasaran" id="sasaran" cols="5" rows="3" class="form-control editor"></textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="tujuan">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="navs-justified-struktur" role="tabpanel">
                <form class="row g-3" action="{{ route('profil.edit', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label">Upload File</label>
                        <!-- <label for="imageUpload" class="form-label mt-2">Upload Foto</label> -->
                        <input type="file" id="ImageUpload" name="fotoStruktur" accept=".png, .jpg, .jpeg" class="d-none" />
                        <label for="ImageUpload" class="btn btn-primary mt-2 mb-2 btn-md w-100">Pilih Foto</label>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* max 2 mb</span> <br>
                        <label class="form-label mt-4">Keterangan</label>
                        <textarea name="ketStruktur" id="ketStruktur" cols="5" rows="3" class="form-control editor"></textarea>
                        <span class="text-danger text-capitalize fw-semibold mt-2">* Opsional</span>
                    </div>  
                    <div class="col-md-8">
                        <label class="form-label">Preview</label>
                        <div class="previewFile">
                            <img id="ImagePreview" src="{{ asset('uploads/images/' . $item->fileStruktur) }}" class="img-fluid" style="max-height: 450px;">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="struktur">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
{{-- hasil  tabel--}}

{{-- <div class="card">
    <div class="card-body">
        <div class="card-title d-flex align-items-center justify-content-between">
            <h5 class="fw-semibold">Daftar Profil</h5>
        </div>
        <table class="table table-bordered">
            <thead class="text-center fw-bolder">
                <tr>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Tujuan</th>
                    <th>Sasran</th>
                    <th>Struktur Organisasi</th>
                </tr>
            </thead>
            <tbody class="text-left">
                @if ($profiles->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center fw-semibold">Belum ada profiles</td>
                    </tr>
                @else
                    @foreach ($profiles as $item)
                        <tr>
                            <td style="text-align: justify;">{{ Str::limit($item->visi , 50, ' ...') }}</td>
                            <td style="text-align: justify;">{{ Str::limit($item->misi , 50, ' ...') }}</td>
                            <td style="text-align: justify;">{{ Str::limit($item->tujuan , 50, ' ...') }}</td>
                            <td style="text-align: justify;">{{ Str::limit($item->sasaran , 50, ' ...') }}</td>
                            <td style="text-align: justify;">{{ Str::limit($item->ketStruktur , 50, ' ...') }}</td>
                            
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
    </div>
</div> --}}
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
                    
                    // Menentukan bagian dari $item yang ingin ditampilkan berdasarkan ID textarea
                    let content = '';
                    @foreach($profiles as $item)
                    switch (textareaId) {
                        case 'visi':
                            content = '{!! $item->visi !!}';
                            break;
                        case 'misi':
                            content = '{!! $item->misi !!}';
                            break;
                        case 'tujuan':
                            content = '{!! $item->tujuan !!}';
                            break;
                        case 'sasaran':
                            content = '{!! $item->sasaran !!}';
                            break;
                        case 'ketStruktur':
                            content = '{!! $item->ketStruktur !!}';
                            break;
                        // Tambahkan kasus lain jika ada lebih banyak textarea
                        default:
                            content = '';
                            break;
                    }
                    @endforeach
                    // Set data dari variabel content ke CKEditor
                    editor.setData(content);
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
