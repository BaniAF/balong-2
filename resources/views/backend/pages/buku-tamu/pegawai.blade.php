@section('title')
    DATA PEGAWAI - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')
@section('content')
@include('sweetalert::alert')
<style>
    .avatar-edit {
    /* Posisi relatif diperlukan untuk mengatur posisi ikon */
        position: relative;
    }

    .avatar-edit input {
        /* Untuk menyembunyikan tombol unggah file */
        display: none;
    }

    .avatar-edit label {
        /* Mengatur tata letak label agar berada di tengah secara horizontal */
        display: flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #ffffff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-edit label i {
        /* Mengatur posisi ikon ke tengah */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 16px;
        color: #757575;
    }
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: auto auto 25px auto;
    }
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #ffffff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit input + label:after {
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
<h6 class="fw-bold mb-4"><span class="text-muted fw-light">Buku Tamu /</span> Daftar Pegawai</h6>
<div class="card">
    <div class="card-body">
        <div class="card-title d-flex align-items-center justify-content-between">
            <h5 class="fw-semibold">Daftar Pegawai</h5>
            <!-- <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" 
                data-bs-toggle="modal"
                data-bs-target="#backDropModal"
                type="button" >
                <i class='bx bxs-file-plus me-2'></i>Tambah
            </button> -->
            <a href="/formPegawai" class="btn btn-md bg-primary mb-2 text-white fw-semibold">
                <i class='bx bxs-user-plus me-2'></i>Tambah Pegawai
            </a>
        </div>
        <table class="table table-bordered">
            <thead class="text-center fw-bolder">
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Nama Pegawai</th>
                    <th>Jenis Kelamin</th>
                    <th>Pangkat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-left">
                @if ($pegawai->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center fw-semibold">Belum ada Data Pegawai</td>
                    </tr>
                @else
                    @php
                        $counter = ($pegawai->currentPage() - 1) * $pegawai->perPage() + 1;
                    @endphp
                    @foreach ($pegawai as $dataPegawai)
                    <tr>
                        <td class="text-center">{{ $counter }}</td>
                        <td class="p-2 m-1">
                            <div class="d-flex m-auto mb-0">
                                <div>
                                    <img src="{{ asset('uploads/Pegawai/' . $dataPegawai->fotoPegawai) }}" alt="Foto Pegawai" class="avatar avatar-md me-2 w-auto" style="border-radius: 10px" data-bs-toggle="modal" data-bs-target="#imagePreviewModal" data-image-src="{{ asset('uploads/Pegawai/' . $dataPegawai->fotoPegawai) }}">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <p class="mb-0 fw-bolder">{{ $dataPegawai->namaPegawai }}</p>
                                    <p class="mb-0">{{ $dataPegawai->nip }} - {{ $dataPegawai->jabatan }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 m-1">{{ $dataPegawai->jenisKelamin }}</td>
                        <td class="p-2 m-1">{{ $dataPegawai->pangkat }}</td>
                        <td class="text-center aligns-item-center">
                            <div class="button-container d-flex justify-content-center align-items-center posting-form">
                                <button
                                    id="btnEditPegawai"
                                    class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill btnEditPegawai" 
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-id="{{ $dataPegawai->id }}"
                                    data-nip="{{ $dataPegawai->nip }}"
                                    data-nama="{{ $dataPegawai->namaPegawai }}"
                                    data-jabatan="{{ $dataPegawai->jabatan }}"
                                    data-jenis="{{ $dataPegawai->jenisKelamin }}"
                                    data-pangkat="{{ $dataPegawai->pangkat }}"
                                    data-pend="{{ $dataPegawai->pendTerakhir }}"
                                    data-foto= "{{$dataPegawai->fotoPegawai}}"
                                >
                                    <i class="bx bx-edit-alt bx-s m-1"></i>
                                </button>
                                <button
                                    id="btn-detail"
                                    class="tf-icons btn btn-sm btn-outline-info me-1 btn-icon rounded-pill btn-detail" 
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalDetail"
                                    data-id="{{ $dataPegawai->id }}"
                                    data-nip="{{ $dataPegawai->nip }}"
                                    data-nama="{{ $dataPegawai->namaPegawai }}"
                                    data-jabatan="{{ $dataPegawai->jabatan }}"
                                    data-jenis="{{ $dataPegawai->jenisKelamin }}"
                                    data-pangkat="{{ $dataPegawai->pangkat }}"
                                    data-pend="{{ $dataPegawai->pendTerakhir }}"
                                    data-foto= "{{$dataPegawai->fotoPegawai}}"
                                >
                                    <i class="bx bx-detail bx-s m-1"></i>
                                </button>
                                <form action="{{ route('pegawai-hapus', $dataPegawai->id) }}" method="post">
                                    @csrf
                                    <!-- Tombol "Delete" -->
                                    <button class="tf-icons btn btn-sm btn-icon btn-outline-danger me-1 rounded-pill show_confirm" 
                                        type="submit"
                                        data-bs-toggle="tooltip"
                                        data-bs-offset="0,4"
                                        data-bs-placement="bottom"
                                        data-bs-html="true"
                                        title="<span>Delete</span>">
                                        <i class="bx bx-trash bx-s m-1"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @php
                        $counter += 1;
                    @endphp
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="page mt-3">
            @if (!$pegawai->isEmpty())
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ $pegawai->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $pegawai->previousPageUrl() }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                    @for ($i = 1; $i <= $pegawai->lastPage(); $i++)
                        <li class="page-item {{ $pegawai->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $pegawai->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $pegawai->currentPage() == $pegawai->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $pegawai->nextPageUrl() }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                </ul>
            </nav>
            @endif
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" enctype="multipart/form-data" method="post" action="{{ route('pegawai-edit', '') }}" id="formEdit">
            @csrf
            <div class="modal-header">
                <h3 class="modal-title" id="backDropModalTitle">Edit Data Pegawai</h3>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <!-- Tambahkan event listener pada input file -->
                        <input type='file' id="editImageUpload" name="fotoPegawai" accept=".png, .jpg, .jpeg" onchange="previewImage(event)"/>
                        <label for="editImageUpload">
                            <i class='bx bxs-edit-alt'></i>
                        </label>
                    </div>
                    <div class="avatar-preview">
                        <div id="editImagePreview"  src="" style="background-image: url('');">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="nameBackdrop" class="form-label">NIP Pegawai</label>
                        <input
                            type="text"
                            name="nip"
                            id="nip"
                            class="form-control border"
                            placeholder="Contoh : 2131730052"
                            readonly
                        />
                        <span class="error-message text-danger" id="nip-error"></span>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Nama Pegawai</label>
                        <input
                            type="text"
                            name="namaPegawai"
                            id="namaPegawai"
                            class="form-control"
                            placeholder="Contoh : Moh. Sifaul Khoir"
                        />
                        <span class="error-message text-danger" id="namaPegawai-error"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="pegawai" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control" onchange="showBidangOptions()">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="Camat">Camat</option>
                            <option value="Sekretaris Kecamatan">Sekretaris Kecamatan</option>
                            <option value="Jabatan Fungsional Tertentu">Jabatan Fungsional Tertentu</option>
                            <option value="Subag Perencanaan dan Keuangan">Subag Perencanaan dan Keuangan</option>
                            <option value="Subag Umum dan Kepegawaian">Subag Umum dan Kepegawaian</option>
                            <option value="Kasi Tata Pemerintahan">Kasi Tata Pemerintahan</option>
                            <option value="Kasi Ketentraman dan Ketertiban">Kasi Ketentraman dan Ketertiban</option>
                            <option value="Kasi Kesejahteraan Sosial">Kasi Kesejahteraan Sosial</option>
                            <option value="Kasi Pembangunan dan Pemberdayaan Masyarakat">Kasi Pembangunan dan Pemberdayaan Masyarakat</option>
                            <option value="Staff">Staff</option>
                            <!-- Tambahkan data pegawai lain sesuai kebutuhan -->
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Jenis Kelamin</label>
                        <div class="col-md">
                            <div class="form-check form-check-inline mt-2">
                                <input
                                class="form-check-input"
                                type="radio"
                                name="jenisKelamin"
                                id="jenisKelamin"
                                value="Laki - Laki"
                                 disabled/>
                                <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                class="form-check-input"
                                type="radio"
                                name="jenisKelamin"
                                id="jenisKelamin"
                                value="Perempuan"
                                disabled
                                />
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="pegawai" class="form-label">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control">
                            <option value="-">-- Pilih Pendidikan --</option>
                            <option value="SD/MI/Sederajat">SD/MI/Sederajat</option>
                            <option value="SMP/MTs/Sederajat">SMP/MTs/Sederajat</option>
                            <option value="SMA/SMK/Sederajat">SMA/SMK/Sederajat</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <!-- Tambahkan data pegawai lain sesuai kebutuhan -->
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="pegawai" class="form-label">Jabatan</label>
                        <select name="pangkat" id="pangkat" class="form-control">
                            <option value="">-- Pilih Pangkat --</option>
                            <option value="Juru">Golongan I - Juru</option>
                            <option value="Pengatur">Golongan II - Pengatur</option>
                            <option value="Penata">Golongan III - Penata</option>
                            <option value="Pembina">Golongan IV - Pembina</option>
                            <!-- Tambahkan data pegawai lain sesuai kebutuhan -->
                        </select>
                    </div>
                    <div class="col-md-4 mb-2" id="golonganOptions">
                        <label for="pegawai" class="form-label">Golongan</label>
                        <select name="golongan" id="golongan" class="form-control">
                            <option value="">-- Pilih Golongan --</option>
                            <option value="I-A">I-A</option>
                            <option value="I-B">I-B</option>
                            <option value="I-C">I-C</option>
                            <option value="I-D">I-D</option>
                            <option value="II-A">II-A</option>
                            <option value="II-B">II-B</option>
                            <option value="II-C">II-C</option>
                            <option value="II-D">II-D</option>
                            <option value="III-A">III-A</option>
                            <option value="III-B">III-B</option>
                            <option value="III-C">III-C</option>
                            <option value="III-D">III-D</option>
                            <option value="IV-A">IV-A</option>
                            <option value="IV-B">IV-B</option>
                            <option value="IV-C">IV-C</option>
                            <option value="IV-D">IV-D</option>
                            <option value="IV-E">IV-E</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex">
                <button type="button" class="btn btn-outline-danger mb-0" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary mb-0" name="submitType" value="simpan" onclick="saveData()"    >Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" enctype="multipart/form-data" method="post" id="formDetail">
            @csrf
            <div class="modal-header">
                <h3 class="modal-title" id="backDropModalTitle">Detail Data Pegawai</h3>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <table>
                            <tbody id="tableDetail">
                                <tr>
                                    <td>
                                        <p class="fw-normal mb-0" style="font-size:15px">Data Pegawai</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5 text-center img-pegawai">
                        <img id="pegawaiImg" src="" alt="Foto Pegawai" style="height:250px; width:250px; border-radius:5px;">
                    </div>

                </div>
            </div>
            <div class="modal-footer d-flex">
                <button type="button" class="btn btn-outline-danger mb-0" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk preview gambar -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imagePreviewModalLabel">Foto Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="previewImage" src="" alt="Preview Gambar Pegawai" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mendapatkan modal dan tombol detail
        const modal = document.getElementById('modalDetail');
        const buttons = document.querySelectorAll('.btn-detail');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                // const nip = this.getAttribute('data-id');
                const nip = this.getAttribute('data-nip');
                const nama = this.getAttribute('data-nama');
                const jabatan = this.getAttribute('data-jabatan');
                const jenis = this.getAttribute('data-jenis');
                const pangkat = this.getAttribute('data-pangkat');
                const fotoP = this.getAttribute('data-foto');
                const pendidikan = this.getAttribute('data-pend');

                // Menampilkan modal
                modal.style.display = 'block';
                // Memanggil fungsi openModal dengan nilai-nilai dari atribut data
                openModal(nip, nama, jabatan, jenis, pangkat, fotoP, pendidikan);
            });
        });
    });
    function openModal(nip, nama, jabatan, jenis, pangkat, fotoP, pendidikan) {
        const modal = document.getElementById('modalDetail');
        modal.style.display = 'block';

        const tableBody = document.getElementById('tableDetail');
        tableBody.innerHTML = ''; // Bersihkan isi tabel sebelum mengisi ulang

        // Menambahkan baris informasi ke dalam tabel
        function addRow(label, value) {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <p class="fw-semibold mb-2 me-2" style="font-size:17px">${label} </p>
                </td>
                <td>
                    <p class="fw-normal mb-2 me-3" style="font-size:17px"> : </p>
                </td>
                <td>
                    <p class="fw-normal mb-2" style="font-size:17px"> ${value}</p>                
                </td>
            `;
            tableBody.appendChild(row);
        }

        // Menambahkan informasi ke dalam tabel
        addRow('NIP Pegawai', nip);
        addRow('Nama Pegawai', nama);
        addRow('Jenis Kelamin', jenis);
        addRow('Pendidikan Terakhir', pendidikan);
        addRow('Jabatan', jabatan);
        addRow('Pangkat / Golongan', pangkat);

        const imgElement = document.querySelector('#pegawaiImg');
        const fotoUrl = `uploads/Pegawai/${fotoP}`; // Membangun URL lengkap gambar
        imgElement.src = fotoUrl;
    }
</script>
<script>
    // Panggil fungsi untuk mendengarkan perubahan pada input imageUpload
    document.getElementById("imageUpload").onchange = function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function () {
                // Set background-image pada imagePreview dengan gambar yang diunggah
                const imagePreview = document.getElementById("imagePreview");
                imagePreview.style.backgroundImage = `url('${reader.result}')`;
            };
            reader.readAsDataURL(file);
        } else {
            // Jika tidak ada gambar yang dipilih, atur gambar pratinjau ke gambar default
            setDefaultImagePreview();
        }
    };
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function () {
            // Set background-image pada imagePreview dengan gambar yang diunggah
            const imagePreview = document.getElementById("editImagePreview");
            imagePreview.style.backgroundImage = `url('${reader.result}')`;
            };
            reader.readAsDataURL(file);
        } else {
            // Jika tidak ada gambar yang dipilih, atur gambar pratinjau ke gambar default (opsional)
            setDefaultImagePreview();
        }
    }
</script>
<script>
        // Edit Form
    $(document).ready(function () {
        // Mendapatkan modal dan form
        var modal = $('#modalEdit');
        var form = $('#formEdit');
        // Ketika tombol edit di klik
        $('.btnEditPegawai').click(function () {
            var pegawaiId = $(this).data('id'); // Mendapatkan nilai data-id    
            console.log("Pegawai ID:", pegawaiId);
            // Mengubah atribut action form dengan nilai pegawaiId
            form.attr('action', '{{ route('pegawai-edit', '') }}' + '/' + pegawaiId);
            console.log("Form action:", form.attr('action')); // Tambahkan ini
            // Menampilkan modal
            modal.modal('show');
            
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.show_confirm');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
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
    // Panggil fungsi showGolonganOptions() ketika elemen "pangkat" berubah nilainya
    document.getElementById("pangkat").addEventListener("change", showGolonganOptions);
    // Panggil fungsi showGolonganOptions() saat halaman pertama kali dimuat untuk menampilkan opsi default
    showGolonganOptions();
</script>
<script>
    function showGolonganOptions() {
        // Mendapatkan elemen select dengan id "pangkat"
        var pangkatSelect = document.getElementById("pangkat");
        // Mendapatkan elemen select dengan id "golongan"
        var golonganSelect = document.getElementById("golongan");
        // Mendapatkan nilai pilihan yang dipilih pada elemen "pangkat"
        var selectedPangkat = pangkatSelect.value;
        // Reset pilihan pada elemen "golongan" menjadi default
        golonganSelect.innerHTML = '<option value="">-- Pilih Golongan --</option>';
        // Mendefinisikan opsi golongan berdasarkan pilihan "pangkat"
        var golonganOptions = {
            "Juru": ["I-A", "I-B", "I-C", "I-D"],
            "Pengatur": ["II-A", "II-B", "II-C", "II-D"],
            "Penata": ["III-A", "III-B", "III-C", "III-D"],
            "Pembina": ["IV-A", "IV-B", "IV-C", "IV-D", "IV-E"]
            // Anda dapat menambahkan opsi lain sesuai dengan kebutuhan
        };
        // Tambahkan opsi golongan sesuai dengan pilihan "pangkat"
        if (selectedPangkat in golonganOptions) {
            var golonganArr = golonganOptions[selectedPangkat];
            for (var i = 0; i < golonganArr.length; i++) {
                var option = document.createElement("option");
                option.value = golonganArr[i];
                option.textContent = golonganArr[i];
                golonganSelect.appendChild(option);
            }
        }
    }

    $(document).ready(function() {
        // Panggil fungsi showGolonganOptions() ketika elemen "pangkat" berubah nilainya
        $('#pangkat').on('change', showGolonganOptions);

        // Panggil fungsi showGolonganOptions() saat halaman pertama kali dimuat untuk menampilkan opsi default
        showGolonganOptions();

        $('#modalEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nip = button.data('nip');
            var nama = button.data('nama');
            var jabatan = button.data('jabatan');
            var jkelamin = button.data('jenis');
            var pangkat = button.data('pangkat'); 
            var pendidikan = button.data('pend'); 
            var foto = button.data('foto'); 

            console.log("Data pada elemen button:", button.data());
            // Fill the values into the edit form
            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#nip').val(nip);
            modal.find('#namaPegawai').val(nama);
            modal.find('#jabatan').val(jabatan);
            modal.find('#pendidikan').val(pendidikan);
            $('input[name="jenisKelamin"]').filter('[value="' + jkelamin + '"]').prop('checked', true);
            var editImagePreview = modal.find('#editImagePreview');
            if (foto) {
                var imageUrl = 'uploads/Pegawai/' + foto; // Assuming the base URL for uploads is 'uploads'
                editImagePreview.css('background-image', "url('" + imageUrl + "')");
            } else {
                // Set a default image if no image is available
                editImagePreview.css('background-image', 'url("")');
            }
            console.log('URL Gambar:', imageUrl);

            // Split the combined value of 'pangkat' and select the appropriate values in the select elements
            var selectPangkat = modal.find('#pangkat');
            var selectGolongan = modal.find('#golongan');

            var splittedPangkat = pangkat.split(' '); // Assuming the data is separated by a space

            if (splittedPangkat.length === 2) {
                var pangkatValue = splittedPangkat[0]; // Get the 'pangkat' part
                var golonganValue = splittedPangkat[1]; // Get the 'golongan' part

                selectPangkat.val(pangkatValue);
                showGolonganOptions(); // Menampilkan pilihan golongan berdasarkan pilihan pangkat
                selectGolongan.val(golonganValue);
            } else {
                // If the data in the database is not in the correct format, do something
                console.log('Data pangkat tidak sesuai format yang diharapkan.');
            }
        });
    });
</script>

@endsection
