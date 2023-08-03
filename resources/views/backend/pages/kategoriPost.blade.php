@section('title')
    KATEGORI POSTINGAN - KECAMATAN BALONG
@endsection
@extends('admin.layout.master')

@section('content')
    @include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Postingan /</span> Kelola Kategori Postingan</h6>
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
                <h5 class="fw-semibold">Daftar Kategori Postingan</h5>
                <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#modalTambah" type="button">
                    <i class='bx bxs-file-plus me-2'></i>Tambah Kategori
                </button>
            </div>
            <table class="table table-bordered">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th style="width: 20px">No</th>
                        <th>Nama Kategori Postingan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($kategori->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center fw-semibold">Belum ada Data Kategori</td>
                        </tr>
                    @else
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($kategori as $kategoriPost)
                            <tr>
                                <td class="text-center">{{ $counter }}</td>
                                <td>{{ $kategoriPost->namaKategori }}</td>
                                <td class="text-center aligns-item-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center posting-form">
                                        <button
                                            class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill btn-program-edit"
                                            type="button" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                            data-id="{{ $kategoriPost->id }}"
                                            data-bs-nama="{{ $kategoriPost->namaKategori }}">
                                            <i class="bx bx-edit-alt bx-s m-1"></i>
                                        </button>
                                        <form action="{{ route('hapus-kategori', $kategoriPost->id) }}" method="post">
                                            @csrf
                                            <!-- Tombol "Delete" -->
                                            <button
                                                class="tf-icons btn btn-sm btn-icon btn-outline-danger me-1 rounded-pill show_confirm"
                                                type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                data-bs-placement="bottom" data-bs-html="true" title="<span>Delete</span>">
                                                <i class="bx bx-trash bx-s m-1"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Tambah Posting -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Kategori Postingan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambah-kategori') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="col">
                            <label for="nameSmall" class="form-label">Nama Kategori</label>
                            <input type="text" id="namaKategori" name="namaKategori" class="form-control"
                                placeholder="Contoh : Kebudayaan" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Kategori -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Kategori Postingan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('edit-kategori', '') }}" method="post" id="editForm">
                    @csrf
                    <div class="modal-body">
                        <div class="col">
                            <label for="nameSmall" class="form-label">Nama Kategori</label>
                            <input type="text" id="namaKategori" name="namaKategori" class="form-control"
                                placeholder="Contoh : Kebudayaan" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.show_confirm');
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Hapus Data',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
        $(document).ready(function() {
            $('#modalEdit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var namaKategori = button.data('bs-nama');

                var modal = $(this);
                modal.find('#namaKategori').val(namaKategori);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Mendapatkan modal dan form
            var modal = $('#modalEdit');
            var form = $('#editForm');

            // Ketika tombol edit di klik
            $('.btn-program-edit').click(function() {
                var kategoriId = $(this).data('id'); // Mendapatkan nilai data-id

                // Mengubah atribut action form dengan nilai kategoriId
                form.attr('action', '{{ route('edit-kategori', '') }}' + '/' + kategoriId);

                // Menampilkan modal
                modal.modal('show');
            });
        });
    </script>
@endsection
