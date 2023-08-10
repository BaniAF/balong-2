@section('title')
    AKUN - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')
@section('content')
    @include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Akun / </span> Daftar Admin</h6>
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
                <h5 class="fw-semibold">Daftar Akun</h5>
                <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#smallModal" type="button">
                    <i class='bx bxs-user-plus me-2'></i>Tambah User
                </button>
            </div>
            <table class="table table-bordered">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th style="width: 20px">No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($user->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center fw-semibold">Belum ada Akun Yang Terdaftar</td>
                        </tr>
                    @else
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($user as $akun)
                            <tr>
                                <td class="text-center">{{ $counter }}</td>
                                <td>
                                        <h6 class="mb-0 text-sm">{{ $akun->namaUser }}</h6>
                                </td>
                                <td>{{ $akun->username }}</td>
                                <td class="text-center aligns-item-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center posting-form">
                                        <button
                                            class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill btn-akun-edit"
                                            type="button" data-bs-toggle="modal" data-bs-target="#backDropEdit"
                                            data-id="{{ $akun->id }}" data-bs-username="{{ $akun->username }}"
                                            data-bs-nama="{{ $akun->namaUser }}" data-bs-password="{{ $akun->userpass }}">
                                            <i class="bx bx-edit-alt bx-s m-1"></i>
                                        </button>
                                        @if ($akun->id != Auth::user()->id)
                                            <form action="{{ route('akun-hapus', $akun->id) }}" method="post">
                                                @csrf
                                                <!-- Tombol "Delete" -->
                                                <button
                                                    class="tf-icons btn btn-sm btn-icon btn-outline-danger me-1 rounded-pill show_confirm"
                                                    type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                    data-bs-placement="bottom" data-bs-html="true"
                                                    title="<span>Delete</span>"
                                                    {{ $akun->id == Auth::user()->id ? 'disabled' : '' }}>
                                                    <i class="bx bx-trash bx-s m-1"></i>
                                                </button>
                                            </form>
                                        @endif
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
    <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="{{ route('tambah-akun') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Tambah Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameSmall" class="form-label">Nama Akun</label>
                                <input type="text" id="nameSmall" class="form-control" placeholder="Contoh : Sifaul"
                                    name="namaUser">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6 mb-0">
                                <label class="form-label" for="emailSmall">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Contoh : Sifaul"
                                    name="username">
                            </div>
                            <div class="col-md-6 mb-0">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="basic-default-password12">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="basic-default-password12"
                                            name="userpass" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password2" />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                                class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="closeButton">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary mb-0" name="submitType"
                            value="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Program Kegiatan -->
    <div class="modal fade" id="backDropEdit" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="post"
                action="{{ route('akun-edit', '') }}" id="editAdminForm">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Edit Program Kegiatan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameSmall" class="form-label">Nama Akun</label>
                            <input type="text" id="namaUser" class="form-control" placeholder="Contoh : Sifaul"
                                name="namaUser">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-6 mb-0">
                            <label class="form-label" for="emailSmall">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Contoh : Sifaul"
                                name="username">
                        </div>
                        <div class="col-md-6 mb-0">
                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password12">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="userpass" name="userpass"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2" minlength="6" />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex">
                    <button type="button" class="btn btn-outline-danger mb-0" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary mb-0" name="submitType" value="simpan">Simpan</button>
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
                var username = button.data('bs-username');
                var namaUser = button.data('bs-nama');
                var userpass = button.data('bs-password');

                var modal = $(this);
                modal.find('#username').val(username);
                modal.find('#namaUser').val(namaUser);
                modal.find('#userpass').val(userpass);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Mendapatkan modal dan form
            var modal = $('#backDropEdit');
            var form = $('#editAdminForm');

            // Ketika tombol edit di klik
            $('.btn-akun-edit').click(function() {
                var userId = $(this).data('id'); // Mendapatkan nilai data-id

                // Mengubah atribut action form dengan nilai userId
                form.attr('action', '{{ route('akun-edit', '') }}' + '/' + userId);

                // Menampilkan modal
                modal.modal('show');
            });
        });
    </script>
@endsection
