@section('title')
    POSTINGAN - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')
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
                <a href="/form-tambahPostingan" class="btn btn-md bg-primary mb-2 text-white fw-semibold">
                    <i class='bx bxs-file-plus me-2'></i>Tambah Postingan
                </a>
            </div>
            <table class="table table-bordered mb-3" id="tabelPost">
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
                    @if ($postinganBelumDiposting->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center fw-semibold">Belum ada postingan</td>
                        </tr>
                    @else
                        @foreach ($postinganBelumDiposting as $post)
                            @if ($post->statusPost != 'Diposting')
                                <tr>
                                    <td class="p-2 m-1 text-center">{{ $post->created_at->format('d M Y') }}</td>
                                    <td class="p-2 m-1">{{ $post->judulPost }}</td>
                                    <td style="text-align: justify;" class="p-2 mb-0">{!! Str::limit($post->isiPost, 50, ' ...') !!}</td>
                                    <td class="text-capitalize">
                                        @if ($post->kategori)
                                            @if ($post->kategori->trashed())
                                                {{ $post->kategori->namaKategori }} <span class="fw-bold text-s text-danger">*Kategori Terhapus</span>
                                            @else
                                                {{ $post->kategori->namaKategori }}
                                            @endif
                                        @else
                                            Tidak Ada Kategori
                                        @endif
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
                                            <a href="{{route('edit-postingan',$post->id)}}"class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill">
                                                <i class="bx bx-edit-alt bx-s m-1"></i>
                                            </a>
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
            <div class="page">
                @if (!$postinganBelumDiposting->isEmpty())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $postinganBelumDiposting->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $postinganBelumDiposting->previousPageUrl() }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $postinganBelumDiposting->lastPage(); $i++)
                                <li class="page-item {{ $postinganBelumDiposting->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $postinganBelumDiposting->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $postinganBelumDiposting->currentPage() == $postinganBelumDiposting->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $postinganBelumDiposting->nextPageUrl() }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
    <!-- Card Posting -->
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-flex align-items-center justify-content-between">
                <h5 class="fw-semibold">Daftar Postingan - Diposting</h5>
            </div>
            <table class="table table-bordered mb-3">
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
                    @if ($postinganDiposting->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center fw-semibold">Belum ada postingan yang Diposting</td>
                        </tr>
                    @else
                        @foreach ($postinganDiposting as $post)
                            @if ($post->statusPost == 'Diposting')
                                <tr>
                                    <td class="p-2 m-1 text-center">{{ $post->created_at->format('d M Y') }}</td>
                                    <td class="p-2 m-1">{{ $post->judulPost }}</td>
                                    <td style="text-align: justify;">{!! Str::limit($post->isiPost, 50, ' ...') !!}</td>
                                    <td class="text-capitalize">
                                        @if ($post->kategori)
                                            @if ($post->kategori->trashed())
                                                {{ $post->kategori->namaKategori }} <span class="fw-bold text-s text-danger">*Kategori Terhapus</span>
                                            @else
                                                {{ $post->kategori->namaKategori }}
                                            @endif
                                        @else
                                            Tidak Ada Kategori
                                        @endif
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
                                                        class="tf-icons btn btn-sm btn-icon btn-outline-success rounded-pill"
                                                        type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                        data-bs-placement="bottom" data-bs-html="true"
                                                        title="<span>Posting</span>">
                                                        <i class="bx bx-check bx-s m-1"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{route('edit-postingan',$post->id)}}"class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill">
                                                <i class="bx bx-edit-alt bx-s m-1"></i>
                                            </a>
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
            <div class="page">
                @if (!$postinganDiposting->isEmpty())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $postinganDiposting->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $postinganDiposting->previousPageUrl() }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $postinganDiposting->lastPage(); $i++)
                                <li class="page-item {{ $postinganDiposting->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $postinganDiposting->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $postinganDiposting->currentPage() == $postinganDiposting->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $postinganDiposting->nextPageUrl() }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#isiPost'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') }}?_token={{ csrf_token() }}',
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
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
