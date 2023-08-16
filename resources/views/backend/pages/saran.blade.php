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
                                        <button
                                            class="tf-icons btn btn-sm btn-outline-primary me-1 btn-icon rounded-pill btn-detail"
                                            type="button" data-bs-toggle="modal" data-bs-target="#modalDetail"
                                            data-id="{{ $isi->id }}"
                                            data-bs-nama="{{ $isi->name }}"
                                            data-bs-email="{{ $isi->email }}"
                                            data-bs-phone="{{ $isi->phone }}"
                                            data-bs-pesan="{{ $isi->message }}"
                                            data-bs-placement="bottom" data-bs-html="true" title="<span>Detail</span>">
                                            <i class='bx bxs-detail'></i>
                                        </button>
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

    <div class="modal fade" id="modalDetail" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" >
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Detail Saran</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-black">
                    <table>
                        <tbody id="tableDetail">
                            <tr>
                                <td>
                                    <p class="fw-normal mb-0" style="font-size:15px">Anggota</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer d-flex mt-1">
                    <button type="button" class="btn btn-outline-danger mb-0" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function openModal(nama,email,phone,pesan) {
        const modal = document.getElementById('modalDetail');
        modal.style.display = 'block';

        const tableBody = document.getElementById('tableDetail');
        tableBody.innerHTML = ''; // Bersihkan isi tabel sebelum mengisi ulang

        // Menambahkan baris informasi ke dalam tabel
        function addRow(label, value) {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <p class="fw-semibold mb-2 me-2" style="font-size:15px">${label} </p>
                </td>
                <td>
                    <p class="fw-normal mb-2 me-3" style="font-size:15px"> : </p>
                </td>
                <td>
                    <p class="fw-normal mb-2 " style="font-size:15px word-break: break-word;"> ${value} </p>                
                </td>
            `;
            tableBody.appendChild(row);
        }

        // Menambahkan informasi ke dalam tabel
        addRow('Nama', nama);
        addRow('E-mail', email);
        addRow('No Hp', phone);
        addRow('Isi Pesan', pesan);
       
        
    }
    function closeModal() {
        const modal = document.getElementById('modalDetail');
        modal.style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Mendapatkan modal dan tombol detail
        const modal = document.getElementById('modalDetail');
        const buttons = document.querySelectorAll('.btn-detail');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                // const nip = this.getAttribute('data-id');
                const nama = this.getAttribute('data-bs-nama');
                const email = this.getAttribute('data-bs-email');
                const phone = this.getAttribute('data-bs-phone');
                const pesan = this.getAttribute('data-bs-pesan');


                // Menampilkan modal
                modal.style.display = 'block';

                // Memanggil fungsi openModal dengan nilai-nilai dari atribut data
                openModal(nama,email,phone,pesan);
            });
        });
    });
</script>