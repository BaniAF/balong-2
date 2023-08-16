@section('title')
    DATA SARAN - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')

@section('content')
    @include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Dashboard /</span> Saran</h6>
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
                <h5 class="fw-semibold">Daftar Saran</h5>
            </div>
            <table class="table table-bordered">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th style="width: 20px">No</th>
                        <th>Nama</th>
                        <th>email</th>
                        <th>Nomor HP</th>
                        <th>Isi Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($saran->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center fw-semibold">Belum ada Saran</td>
                        </tr>
                    @else
                        @php
                            $counter = ($saran->currentPage() - 1) * $saran->perPage() + 1;
                        @endphp
                        @foreach ($saran as $isi)
                            <tr>
                                <td class="text-center">{{ $counter }}</td>
                                <td>{{ $isi->name }}</td>
                                <td>{{ $isi->email }}</td>
                                <td>{{ $isi->phone }}</td>
                                <td style="text-align: justify;" class="p-2 mb-0">
                                    {{ Str::limit($isi->message, 15, ' ...') }}</td>
                                {{-- kata = words | hruf = limit --}}
                                <td class="text-center aligns-item-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center posting-form">
                                        <form action="{{ route('saran.lihat', $isi->id) }}" method="post">
                                            @csrf
                                            <button
                                                class="tf-icons btn btn-sm btn-icon btn-outline-danger me-1 rounded-pill show_confirm"
                                                type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                data-bs-placement="bottom" data-bs-html="true" title="<span>Details</span>">
                                                <i class='bx bxs-detail'></i>
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
            <div class="page mt-3">
                @if (!$saran->isEmpty())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $saran->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $saran->previousPageUrl() }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $saran->lastPage(); $i++)
                                <li class="page-item {{ $saran->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $saran->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $saran->currentPage() == $saran->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $saran->nextPageUrl() }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
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
@endsection