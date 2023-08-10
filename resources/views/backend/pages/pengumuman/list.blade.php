@section('title')
    PENGUMUMAN - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')

@section('content')
    @include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Dashboard /</span> Pengumuman</h6>
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
                <h5 class="fw-semibold">Daftar Pengumuman</h5>
                <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#backDropModal" type="button">
                    <i class='bx bxs-cloud-upload'></i> | Tambah Gambar
                </button>
            </div>
            <table class="table table-bordered">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th style="width: 20px">No</th>
                        <th>Nama File</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($announcement->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center fw-semibold">Belum ada Program Kegiatan</td>
                        </tr>
                    @else
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($announcement as $item)
                            <tr>
                                <td class="text-center">{{ $counter }}</td>
                                <td>{{ $item->image }}</td>
                                {{-- <td style="text-align: justify;">{{ Str::words($item->descProker, 10, ' ...') }}</td> --}}
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('images/' . $item->image) }}" alt="Pengumuman Image"
                                            class=""
                                            style="height: 200px;
                                                width: auto;
                                            ">
                                    @endif
                                </td>
                                <td class="text-center aligns-item-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center posting-form">
                                        <form action="{{ route('gambar.hapus', $item->id) }}" method="post">
                                            @csrf
                                            <!-- Tombol "Delete" -->
                                            <button
                                                class="tf-icons btn btn-sm btn-icon btn-outline-danger me-1 rounded-pill show_confirm"
                                                type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                data-bs-placement="bottom" data-bs-html="true" title="<span>Delete</span>">
                                                <i class="bx bx-trash bx-s m-1"></i>
                                            </button>
                                        </form>
                                        <!-- Tombol Aktifkan / Nonaktifkan -->
                                        <form action="{{ route('gambar.aktifkan', $item->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-icon btn-outline-secondary me-1 rounded-pill"
                                                type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                data-bs-placement="bottom" data-bs-html="true"
                                                title="<span>{{ $item->aktif ? 'Nonaktifkan' : 'Aktifkan' }}</span>">
                                                @if ($item->aktif)
                                                    <i class="bx bxs-check-circle bx-m m-1" style='color:#07d51b'></i>
                                                @else
                                                    <i class="bx bxs-x-circle bx-m m-1" style='color:#d50707'></i>
                                                @endif
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
            <form class="modal-content" enctype="multipart/form-data" method="post" action="{{ route('tambah-gambar') }}">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Tambah Gambar</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div>
                        <label for="nameBackdrop" class="form-label">Tambahkan Gambar <span
                                class="text-capitalize fw-semibold text-danger">*</span></label>
                        <input type="file" name="image" id="image" class="form-control mb-1" accept="images/*"
                            max="2048">
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
    </script>
@endsection
