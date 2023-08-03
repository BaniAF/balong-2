@section('title')
    PROGRAM KEGIATAN - KECAMATAN BALONG
@endsection
@extends('admin.layout.master')

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
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($saran->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center fw-semibold">Belum ada Saran</td>
                        </tr>
                    @else
                        @php
                            $counter = 1;
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
                                        <button
                                            class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill btn-program-edit"
                                            type="button" data-bs-toggle="modal" data-bs-target="#backDropEdit"
                                            data-id="{{ $isi->id }}" data-bs-nama="{{ $isi->nama }}"
                                            data-bs-deskripsi="{{ $isi->alamat }}">
                                            <i class="bx bx-edit-alt bx-s m-1"></i>
                                        </button>
                                        <form action="{{ route('program.hapus', $isi->id) }}" method="post">
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
@endsection
