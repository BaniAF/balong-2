@section('title')
    PEGAWAI - KECAMATAN BALONG
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
<h6 class="fw-bold mb-4"><span class="text-muted fw-light">Pegawai /</span> Tambah Pegawai</h6>
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
<!-- Tampilan Edit Berita -->
<div class="card">
    <div class="card-body">
        <div class="card-title d-flex align-items-center justify-content-between">
            <h5 class="fw-semibold">Tambah Pegawai</h5>
        </div>
        <form  enctype="multipart/form-data" method="post" action="{{ route('tambah-pegawai') }}" id="formTambah">
            @csrf
            <!-- <div class="modal-body"> -->
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" name="fotoPegawai" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload">
                            <i class='bx bxs-edit-alt'></i>
                        </label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url('');">
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
                                />
                                <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                class="form-check-input"
                                type="radio"
                                name="jenisKelamin"
                                id="jenisKelamin"
                                value="Perempuan"
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
                            <option value="-">-- Pilih Pangkat --</option>
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
                        <label for="pegawai" class="form-label">Pangkat</label>
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
                            <!-- Tambahkan data pegawai lain sesuai kebutuhan -->
                        </select>
                    </div>
                </div>
            <!-- </div> -->
            <div class="d-flex justify-content-end mt-2 ">
                <button type="button" class="btn btn-danger me-2" name="submitType" onclick="goBack()">Batal</button>
                <!-- <button type="button" class="btn btn-primary mb-0" name="submitType" value="simpan" onclick="saveData()">Simpan</button> -->
                <button type="submit" class="btn btn-primary mb-0" name="submitType" value="simpan">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
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
    // Panggil fungsi showGolonganOptions() ketika elemen "pangkat" berubah nilainya
    document.getElementById("pangkat").addEventListener("change", showGolonganOptions);
    // Panggil fungsi showGolonganOptions() saat halaman pertama kali dimuat untuk menampilkan opsi default
    showGolonganOptions();
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
</script>
@endsection