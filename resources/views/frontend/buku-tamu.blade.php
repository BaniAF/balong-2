@extends('frontend.layouts.app')
@section('title')
    BUKU TAMU - KECAMATAN BALONG
@endsection
@section('content')
<div class="container mx-auto mt-1">
    <div class="flex justify-center items-center">
        <div class="w-7/12 border border-black p-10">
            <h2 class="text-center text-xl font-semibold mb-6">BUKU TAMU</h2>
            <div class="container" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                <form class="" enctype="multipart/form-data" method="post" action="{{ route('tambah.tamu') }}">
                    @csrf
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="namaPengunjung" class="form-label">Nama Pengunjung</label>
                                <input type="text" name="namaPengunjung" id="namaPengunjung" class="form-input w-full px-4 py-2 rounded border focus:outline-none focus:border-blue-500" placeholder="Contoh : Moh. Sifaul Khoir" />
                            </div>
                            <div>
                                <label for="noTelp" class="form-label">Nomor Telepon</label>
                                <input type="text" name="noTelp" id="noTelp" class="form-input w-full px-4 py-2 rounded border focus:outline-none focus:border-blue-500" placeholder="Contoh : 081332408340" />
                            </div>
                        </div>
                        <div class="mb-4" id="jenisKeperluanContainer">
                            <label for="keperluan" class="form-label">Jenis Keperluan</label>
                            <select name="keperluan" id="keperluan" class="form-input w-full px-4 py-2 rounded border focus:outline-none focus:border-blue-500" onchange="showOptions()">
                                <option value="">-- Pilih Keperluan --</option>
                                <option value="Penerbitan Surat">Penerbitan Surat</option>
                                <option value="Bertemu Dengan">Bertemu Dengan</option>
                                <option value="Pelayanan Masyarakat">Pelayanan Masyarakat</option>
                                <option value="Pengaduan Masyarakat">Pengaduan Masyarakat</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="suratOptions" style="display: none;">
                            <div>
                                <label for="surat" class="form-label">Jenis Surat</label>
                                <select name="surat" id="surat" class="form-input w-full px-4 py-2 rounded border focus:outline-none focus:border-blue-500">
                                    <option value="">-- Pilih Surat --</option>
                                    <option value="Akta Kelahiran">Akta Kelahiran</option>
                                    <!-- Pilihan surat lainnya -->
                                </select>
                            </div>
                            <div id="pegawaiOptions" style="display: none;">
                                <label for="pegawai" class="form-label">Pilih Pegawai</label>
                                <select name="pegawai" id="pegawai" class="form-input w-full px-4 py-2 rounded border focus:outline-none focus:border-blue-500">
                                    <option value="">-- Pilih Pegawai --</option>
                                    <!-- Looping data pegawai -->
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="5" rows="3" class="form-input w-full px-4 py-2 rounded border focus:outline-none focus:border-blue-500" placeholder="Contoh : Pengajuan Surat PKL"></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Simpan</button>
                    </div>
                </form>
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
