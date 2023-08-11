@extends('frontend.layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top:20px;">
        <div class="row" style="d-flex justify-content-center items-align-center">
            <div class="col-md-7 border bordered-black"
                style="margin-left:50px;margin-right:10px; padding:10px; d-flex justify-content-center items-align-center">
                <h2 class="text-center"> BUKU TAMU </h2>
                <div class="container" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                    <div class="">
                        <form class="" enctype="multipart/form-data" method="post"
                            action="{{ route('tambah.tamu') }}">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="nameBackdrop" class="form-label">Nama Pengunjung</label>
                                        <input type="text" name="namaPengunjung" id="namaPengunjung" class="form-control"
                                            placeholder="Contoh : Moh. Sifaul Khoir" />
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="nameBackdrop" class="form-label">Nomor Telepon</label>
                                        <input type="text" name="noTelp" id="noTelp" class="form-control"
                                            placeholder="Contoh : 081332408340" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2" id="jenisKeperluanContainer">
                                        <label for="nameBackdrop" class="form-label">Jenis Keperluan</label>
                                        <select name="keperluan" id="keperluan" class="form-control"
                                            onchange="showOptions()">
                                            <option value="">-- Pilih Keperluan --</option>
                                            <option value="Penerbitan Surat">Penerbitan Surat</option>
                                            <option value="Bertemu Dengan">Bertemu Dengan</option>
                                            <option value="Pelayanan Masyarakat">Pelayanan Masyarakat</option>
                                            <option value="Pengaduan Masyarakat">Pengaduan Masyarakat</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2" id="suratOptions" style="display: none;">
                                        <label for="nameBackdrop" class="form-label">Jenis Surat</label>
                                        <select name="surat" id="surat" class="form-control">
                                            <option value="">-- Pilih Surat --</option>
                                            <option value="Akta Kelahiran">Akta Kelahiran</option>
                                            <option value="Akta Kematian">Akta Kematian</option>
                                            <option value="Akta Nikah">Akta Nikah</option>
                                            <option value="Izin Usaha">Izin Usaha</option>
                                            <option value="Kartu Keluarga">Kartu Keluarga</option>
                                            <option value="Izin Acara / Kegiatan">Izin Acara / Kegiatan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2" id="pegawaiOptions" style="display: none;">
                                        <label for="pegawai" class="form-label">Pilih Pegawai</label>
                                        <select name="pegawai" id="pegawai" class="form-control">
                                            <option value="">-- Pilih Pegawai --</option>
                                            @foreach ($pegawai as $dataPegawai)
                                                <option value="{{ $dataPegawai->namaPegawai }}">
                                                    {{ $dataPegawai->namaPegawai }}</option>
                                            @endforeach
                                            <!-- Tambahkan data pegawai lain sesuai kebutuhan -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="nameBackdrop" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" cols="5" rows="3" class="form-control"
                                        placeholder="Contoh : Pengajuan Surat PKL"></textarea>
                                </div>
                            </div>
                            <div class=" d-flex">
                                <button type="submit" class="btn btn-primary mb-0" name="submitType"
                                    value="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showOptions() {
            const jenisKeperluan = document.getElementById("keperluan");
            const jenisKeperluanContainer = document.getElementById("jenisKeperluanContainer");
            const pegawaiOptions = document.getElementById("pegawaiOptions");
            const suratOptions = document.getElementById("suratOptions");

            // Jika pilihan "Bertemu Dengan" dipilih, tampilkan opsi pegawai
            if (jenisKeperluan.value === "Penerbitan Surat") {
                suratOptions.style.display = "block";
                pegawaiOptions.style.display = "none";
                // Set ukuran kolom jenisKeperluan menjadi col-md-6
                jenisKeperluanContainer.classList.remove("col-md-12");
                jenisKeperluanContainer.classList.add("col-md-6");
            } else if (jenisKeperluan.value === "Bertemu Dengan") {
                pegawaiOptions.style.display = "block";
                suratOptions.style.display = "none";
                // Set ukuran kolom jenisKeperluan menjadi col-md-6
                jenisKeperluanContainer.classList.remove("col-md-12");
                jenisKeperluanContainer.classList.add("col-md-6");
            } else {
                // Jika tidak tampil, set ukuran kolom jenisKeperluan menjadi col-md-12
                pegawaiOptions.style.display = "none";
                suratOptions.style.display = "none";
                jenisKeperluanContainer.classList.remove("col-md-6");
                jenisKeperluanContainer.classList.add("col-md-12");
            }
        }
    </script>
@endsection
