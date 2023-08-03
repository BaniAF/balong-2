@section('title')
    POSTINGAN - KECAMATAN BALONG
@endsection
@extends('admin.layout.master')
@section('content')
    @include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Postingan /</span> Kelola Postingan</h6>
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
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-center justify-content-between">
                <h5 class="fw-semibold">Daftar Postingan</h5>
                <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#backDropModal" type="button">
                    <i class='bx bxs-file-plus me-2'></i>Tambah Postingan
                </button>
            </div>
            <table class="table table-bordered" id="tabelPost">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th>Tanggal</th>
                        <th width="150px">Judul</th>
                        <th>Isi Postingan</th>
                        <th>Kategori</th>
                        <th>Users</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($postingan->where('statusPost', '!=', 'Diposting')->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center fw-semibold">Belum ada postingan</td>
                        </tr>
                    @else
                        @foreach ($postingan as $post)
                            @if ($post->statusPost != 'Diposting')
                                <tr>
                                    <td class="p-2 m-1 text-center">{{ $post->created_at->format('d M Y') }}</td>
                                    <td class="p-2 m-1">{{ $post->judulPost }}</td>
                                    <td style="text-align: justify;" class="p-2 mb-0">{!! Str::words($post->isiPost, 15, ' ...') !!}</td>
                                    <td class="text-capitalize">
                                        {{ $post->kategori ? $post->kategori->namaKategori : 'Tidak Diketahui' }}
                                    </td>
                                    <td>{{ $post->userPost }}</td>
                                    <td class="d-flex justify-content-center">
                                        @if ($post->statusPost == 'Belum Diposting')
                                            <span class="badge bg-secondary me-1">{{ $post->statusPost }}</span>
                                        @else
                                            <span class="badge bg-success me-1">{{ $post->statusPost }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center aligns-item-center">
                                        <div
                                            class="button-container d-flex justify-content-center align-items-center posting-form">
                                            <!-- Tombol "Posting" -->
                                            @if ($post->statusPost == 'Belum Diposting')
                                                <form action="{{ route('postingan.updateStatus', $post->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button id="submitPostingButton"
                                                        class="btn btn-sm btn-icon btn-outline-success me-1 rounded-pill"
                                                        type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                        data-bs-placement="bottom" data-bs-html="true"
                                                        title="<span>Posting</span>">
                                                        <i class="bx bx-check bx-s m-1"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <button
                                                class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill edit-post-btn"
                                                type="button" data-bs-toggle="modal" data-bs-target="#backDropEdit"
                                                data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                                                data-id="{{ $post->id }}" data-bs-judul="{{ $post->judulPost }}"
                                                data-bs-isi="{{ $post->isiPost }}"
                                                data-bs-status="{{ $post->statusPost }}"
                                                data-bs-kategori="{{ $post->kategoriPost }}"
                                                data-bs-foto="{{ $post->fotoPost }}" title="<span>Edit</span>">
                                                <i class="bx bx-edit-alt bx-s m-1"></i>
                                            </button>
                                            <form action="{{ route('postingan.hapus', $post->id) }}" method="post">
                                                @csrf
                                                <!-- Tombol "Delete" -->
                                                <button
                                                    class="tf-icons btn btn-sm btn-icon btn-outline-danger me-1 rounded-pill show_confirm"
                                                    type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                    data-bs-placement="bottom" data-bs-html="true"
                                                    title="<span>Delete</span>">
                                                    <i class="bx bx-trash bx-s m-1"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Card Posting -->
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-flex align-items-center justify-content-between">
                <h5 class="fw-semibold">Daftar Postingan - Diposting</h5>
            </div>
            <table class="table table-bordered ">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th>Tanggal</th>
                        <th width="150px">Judul</th>
                        <th>Isi Postingan</th>
                        <th>Kategori</th>
                        <th>Users</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($postingan->where('statusPost', '==', 'Diposting')->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center fw-semibold">Belum ada postingan yang Diposting</td>
                        </tr>
                    @else
                        @foreach ($postingan as $post)
                            @if ($post->statusPost == 'Diposting')
                                <tr>
                                    <td class="p-2 m-1 text-center">{{ $post->created_at->format('d M Y') }}</td>
                                    <td class="p-2 m-1">{{ $post->judulPost }}</td>
                                    <td style="text-align: justify;">{!! Str::words($post->isiPost, 10, ' ...') !!}</td>
                                    <td class="text-capitalize">{{ $post->kategori->namaKategori }}</td>
                                    <td>{{ $post->userPost }}</td>
                                    <td class="d-flex justify-content-center">
                                        @if ($post->statusPost == 'Belum Diposting')
                                            <span class="badge bg-secondary me-1">{{ $post->statusPost }}</span>
                                        @else
                                            <span class="badge bg-success me-1">{{ $post->statusPost }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center aligns-item-center">
                                        <div
                                            class="button-container d-flex justify-content-center align-items-center posting-form">
                                            <!-- Tombol "Posting" -->
                                            @if ($post->statusPost == 'Belum Diposting')
                                                <form action="{{ route('postingan.updateStatus', $post->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button id="submitPostingButton"
                                                        class="tf-icons btn btn-sm btn-icon btn-outline-success rounded-pill"
                                                        type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                        data-bs-placement="bottom" data-bs-html="true"
                                                        title="<span>Posting</span>">
                                                        <i class="bx bx-check bx-s m-1"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <button
                                                class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill edit-post-btn"
                                                type="button" data-bs-toggle="modal" data-bs-target="#backDropEdit"
                                                data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                                                data-id="{{ $post->id }}" data-bs-judul="{{ $post->judulPost }}"
                                                data-bs-isi="{{ $post->isiPost }}"
                                                data-bs-status="{{ $post->statusPost }}"
                                                data-bs-kategori="{{ $post->kategoriPost }}"
                                                data-bs-foto="{{ $post->fotoPost }}" title="<span>Edit</span>">
                                                <i class="bx bx-edit-alt bx-s m-1"></i>
                                            </button>
                                            <form action="{{ route('postingan.hapus', $post->id) }}" method="post">
                                                @csrf
                                                <!-- Tombol "Delete" -->
                                                <button
                                                    class="tf-icons btn btn-sm btn-icon btn-outline-danger me-1 rounded-pill show_confirm"
                                                    type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                    data-bs-placement="bottom" data-bs-html="true"
                                                    title="<span>Delete</span>">
                                                    <i class="bx bx-trash bx-s m-1"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Posting -->
    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="post"
                action="{{ route('tambah-postingan') }}">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Tambah Berita</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nameBackdrop" class="form-label">Judul Postingan</label>
                            <input type="text" name="judulPost" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : Hari Jadi Kecamatan Balong" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="nameBackdrop" class="form-label">Isi Postingan</label>
                        <textarea name="isiPost" id="isiPost" cols="10" rows="3" class="form-control"
                            placeholder="Isi Postingan / Berita"></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="dobBackdrop" class="form-label">Kategori Postingan</label>
                            <select name="kategoriPost" id="kategoriPost" class="form-control">
                                <option value="">--Pilih Kategori--</option>
                                @foreach ($kategoriList as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->namaKategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="imageUpload" class="form-label">Upload Foto</label>
                            <input type="file" id="imageUpload" name="fotoPost" accept=".png, .jpg, .jpeg"
                                class="form-control" />
                        </div>
                        <div class="col">
                            <label class="form-label">Preview Foto</label>
                            <div class="avatar-preview">
                                <img id="imagePreview" src="" class="img-fluid" style="max-height: 200px;">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="userPost" value="{{ Auth::user()->namaUser }}">
                </div>
                <input type="hidden" name="statusPost" id="statusPost" value="Belum Diposting">
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" name="submitType" value="simpan">Simpan</button>
                    <button type="submit" class="btn btn-success" name="submitType" value="posting">Posting</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="backDropEdit" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="post"
                action="{{ route('postingan.update', '') }}" id="formPostEdit">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Edit Berita</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nameBackdrop" class="form-label">Judul Postingan</label>
                            <input type="text" name="judulPost" id="judulPost" class="form-control"
                                placeholder="Contoh : Hari Jadi Kecamatan Balong" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="nameBackdrop" class="form-label">Isi Postingan</label>
                        <textarea name="isiPost" id="isiPostEdit" cols="10" rows="3" class="form-control isi-edit"
                            placeholder="Isi Postingan / Berita"></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="dobBackdrop" class="form-label">Kategori Postingan</label>
                            <select name="kategoriPost" id="kategoriPost" class="form-control">
                                <option value="">--Pilih Kategori--</option>
                                @foreach ($kategoriList as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->namaKategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="imageUpload" class="form-label">Upload Foto</label>
                            <input type="file" id="editImageUpload" name="fotoPost" accept=".png, .jpg, .jpeg"
                                class="form-control" />
                        </div>
                        <div class="col">
                            <label class="form-label">Preview Foto</label>
                            <div class="avatar-preview">
                                <img id="editImagePreview" src="" class="img-fluid" style="max-height: 200px;">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="userPost" value="{{ Auth::user()->namaUser }}">
                </div>
                <input type="hidden" name="statusPost" id="statusPost">
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" name="submitType" value="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#isiPost'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        document.getElementById('imageUpload').addEventListener('change', function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            };

            reader.readAsDataURL(this.files[0]);
        });
        // Function to clear image preview
        var modalElement = document.getElementById('backDropModal');
        modalElement.addEventListener('hidden.bs.modal', function() {
            document.getElementById('imageUpload').value = '';
            document.getElementById('imagePreview').src = '';
        });
    </script>
    <script>
        $(document).ready(function() {
            // Mendapatkan modal dan form
            var modal = $('#backDropEdit');
            var form = $('#formPostEdit');
            // Ketika tombol edit di klik
            $('.edit-post-btn').click(function() {
                var postId = $(this).data('id'); // Mendapatkan nilai data-id    
                // Mengubah atribut action form dengan nilai postId
                form.attr('action', '{{ route('postingan.update', '') }}' + '/' + postId);

                // Menampilkan modal
                modal.modal('show');

            });
        });
        $(document).ready(function() {
            $('#tabelPost').DataTable();
        });
    </script>

    <!-- Script Modal edit -->
    <script>
        document.getElementById('editImageUpload').addEventListener('change', function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('editImagePreview').src = e.target.result;
            };

            reader.readAsDataURL(this.files[0]);
        });
        // Function to clear image preview
        var modalElement = document.getElementById('backDropEdit');
        modalElement.addEventListener('hidden.bs.modal', function() {
            document.getElementById('editImageUpload').value = '';
            document.getElementById('editImagePreview').src = '';
        });

        $(document).ready(function() {
            var editorInstance = null; // Store the CKEditor instance

            $('#backDropEdit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var postId = button.data('id'); // Get the post ID from data-id attribute
                var judulPost = button.data('bs-judul'); // Get the value of data-bs-judul
                var isiPost = button.data('bs-isi'); // Get the value of data-bs-isi
                var statusPost = button.data('bs-status'); // Get the value of data-bs-status
                var kategoriPost = button.data('bs-kategori'); // Get the value of data-bs-kategori
                var fotoPost = button.data('bs-foto'); // Get the value of data-bs-foto

                // Fill the values into the edit form
                var modal = $(this);
                modal.find('#idPost').val(postId);
                modal.find('#judulPost').val(judulPost);
                modal.find('#statusPost').val(statusPost);
                modal.find('#kategoriPost').val(kategoriPost);
                modal.find('#editImageUpload').next('.custom-file-label').addClass('selected').html(
                    fotoPost);
                modal.find('#editImagePreview').attr('src', '{{ asset('uploads/') }}' + '/' + fotoPost);

                // Destroy the previous CKEditor instance if it exists
                if (editorInstance) {
                    editorInstance.destroy().then(function() {
                        // Initialize CKEditor with the new isiPost value
                        ClassicEditor
                            .create(document.querySelector('.isi-edit'))
                            .then(editor => {
                                editor.setData(isiPost); // Set the value of isiPost in CKEditor
                                editorInstance = editor; // Store the new CKEditor instance
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    });
                } else {
                    // Initialize CKEditor if it hasn't been initialized before
                    ClassicEditor
                        .create(document.querySelector('.isi-edit'))
                        .then(editor => {
                            editor.setData(isiPost); // Set the value of isiPost in CKEditor
                            editorInstance = editor; // Store the CKEditor instance
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        });
    </script>

    <!-- Modal Hapus dan Posting -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.bx-trash');
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin menghapus postingan ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
            const postButtons = document.querySelectorAll('submitPostingButton');
            postButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin memposting postingan ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Posting',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
