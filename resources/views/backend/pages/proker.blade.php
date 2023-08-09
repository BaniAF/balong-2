@section('title')
    PROGRAM KEGIATAN - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')

@section('content')
    @include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Dashboard /</span> Program Kegiatan</h6>
    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Error",
                text: "Lengkapi data input!",
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
                <h5 class="fw-semibold">Daftar Program Kegiatan</h5>
                <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#backDropModal" type="button">
                    <i class='bx bxs-file-plus me-2'></i>Tambah Program
                </button>
            </div>
            <table class="table table-bordered">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th style="width: 20px">No</th>
                        <th>Nama Program Kegiatan</th>
                        <th>Deskripsi Program Kegiatan</th>
                        <th>Dokumen</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($prokerja->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center fw-semibold">Belum ada Program Kegiatan</td>
                        </tr>
                    @else
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($prokerja as $proker)
                            <tr>
                                <td class="text-center">{{ $counter }}</td>
                                <td>{{ $proker->namaProker }}</td>
                                <td style="text-align: justify;">{{ Str::words($proker->descProker , 10, ' ...') }}</td>
                                <td>{{ $proker->fileProgram }}</td>
                                <td class="text-center aligns-item-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center posting-form">
                                        <button
                                            class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill btn-program-edit"
                                            type="button" data-bs-toggle="modal" data-bs-target="#backDropEdit"
                                            data-id="{{ $proker->id }}" data-bs-nama="{{ $proker->namaProker }}"
                                            data-bs-deskripsi="{{ $proker->descProker }}">
                                            <i class="bx bx-edit-alt bx-s m-1"></i>
                                        </button>
                                        <form action="{{ route('program.hapus', $proker->id) }}" method="post">
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
    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="post" action="{{ route('tambah-program') }}">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Tambah Program Kegiatan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nameBackdrop" class="form-label">Nama Program Kegiatan</label>
                            <input type="text" name="namaProker" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : Hari Jadi Kecamatan Balong" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="nameBackdrop" class="form-label">Deskripsi Kegiatan</label>
                        <textarea name="descProker" id="descProker" cols="10" rows="3" class="form-control"
                            placeholder="Isi Postingan / Berita"></textarea>
                    </div>
                    <div>
                        <label for="nameBackdrop" class="form-label">Tambahkan File <span class="text-capitalize fw-semibold text-danger">*</span></label>
                        <input type="file" name="fileProgram" id="fileProgram" class="form-control mb-1" accept=".pdf" max="2048">
                        <span class="text-capitalize fw-semibold text-danger">* Opsional.</span>
                    </div>
                    <div class="modal-footer d-flex">
                        <button type="button" class="btn btn-outline-danger mb-0" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary mb-0" name="submitType" value="simpan">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Program Kegiatan -->
    <div class="modal fade" id="backDropEdit" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="post" action="{{ route('proker-edit', '') }}"
                id="editProgramForm">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Edit Program Kegiatan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nameBackdrop" class="form-label">Nama Program Kegiatan</label>
                            <input type="text" name="namaProker" id="namaProker" class="form-control"
                                placeholder="Contoh : Hari Jadi Kecamatan Balong" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="nameBackdrop" class="form-label">Deskripsi Kegiatan</label>
                        <textarea name="descProker" id="descProker" cols="10" rows="3" class="form-control"
                            placeholder="Isi Postingan / Berita"></textarea>
                    </div>
                    <div>
                        <label for="nameBackdrop" class="form-label">Tambahkan File <span class="text-capitalize fw-semibold text-danger">*</span></label>
                        <input type="file" name="fileProgram" id="fileProgram" class="form-control mb-1" accept=".pdf" max="2048">
                        <span class="text-capitalize fw-semibold text-danger">* Tidak Perlu Di isi jika tidak ada perubahan.</span>
                    </div>
                    <div class="modal-footer d-flex">
                        <button type="button" class="btn btn-outline-danger mb-0" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary mb-0" name="submitType"
                            value="simpan">Simpan</button>
                    </div>
                </div>
            </form>
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
            $('#backDropEdit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var namaProker = button.data('bs-nama');
                var descProker = button.data('bs-deskripsi');

                var modal = $(this);
                modal.find('#namaProker').val(namaProker);
                modal.find('#descProker').val(descProker);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Mendapatkan modal dan form
            var modal = $('#backDropEdit');
            var form = $('#editProgramForm');

            // Ketika tombol edit di klik
            $('.btn-program-edit').click(function() {
                var programId = $(this).data('id'); // Mendapatkan nilai data-id

                // Mengubah atribut action form dengan nilai programId
                form.attr('action', '{{ route('proker-edit', '') }}' + '/' + programId);

                // Menampilkan modal
                modal.modal('show');
            });
        });
    </script>
@endsection
