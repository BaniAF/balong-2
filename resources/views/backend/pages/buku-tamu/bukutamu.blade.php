@section('title')
    BUKU TAMU - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')

@section('content')
@include('sweetalert::alert')
<h6 class="fw-bold mb-4"><span class="text-muted fw-light">Buku Tamu /</span> Daftar Buku Tamu</h6>
<div class="card">
    <div class="card-body">
        <div class="card-title d-flex align-items-center justify-content-between">
            <h5 class="fw-semibold">Data Buku Tamu</h5>
            <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" 
                data-bs-toggle="modal"
                data-bs-target="#backDropModal"
                type="button" >
                <i class='bx bxs-file-plus me-2'></i>Tambah
            </button>
        </div>
        <table class="table table-bordered">
            <thead class="text-center fw-bolder">
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Tanggal</th>
                    <th>Nama Pengunjung</th>
                    <th>Keperluan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody class="text-left">
                @if ($bukutamu->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center fw-semibold">Belum ada data Pengunjung</td>
                    </tr>
                @else
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($bukutamu as $dataTamu)
                    <tr>
                        <td class="text-center">{{ $counter }}</td>
                        <td class="p-2 m-1">{{ $dataTamu->created_at->format('d M Y') }}</td>
                        <td class="p-2 m-1">{{ $dataTamu->namaPengunjung }}</td>
                        <td class="p-2 m-1">{{ $dataTamu->keperluan }}</td>
                        <td class="p-2 m-1">{{ $dataTamu->keterangan }}</td>
                    </tr>
                    @php
                        $counter += 1;
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
        <form class="modal-content" enctype="multipart/form-data" method="post" action="{{ route('tambah-tamu') }}">
            @csrf
            <div class="modal-header">
                <h3 class="modal-title" id="backDropModalTitle">Tambah Buku Tamu</h3>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Nama Pengunjung</label>
                        <input
                            type="text"
                            name="namaPengunjung"
                            id="namaPengunjung"
                            class="form-control"
                            placeholder="Contoh : Moh. Sifaul Khoir"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Nomor Telepon</label>
                        <input
                            type="text"
                            name="noTelp"
                            id="noTelp"
                            class="form-control"
                            placeholder="Contoh : 081332408340"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2" id="jenisKeperluanContainer">
                        <label for="nameBackdrop" class="form-label">Jenis Keperluan</label>
                        <select name="keperluan" id="keperluan" class="form-control" onchange="showOptions()"> 
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
                            <option value="Izin Acara / Kegiatan">Izin Acara / Kegiatan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2" id="pegawaiOptions" style="display: none;">
                        <label for="pegawai" class="form-label">Pilih Pegawai</label>
                        <select name="pegawai" id="pegawai" class="form-control">
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach($pegawai as $dataPegawai)
                                <option value="{{ $dataPegawai->namaPegawai }}">{{ $dataPegawai->namaPegawai }}</option>
                            @endforeach
                            <!-- Tambahkan data pegawai lain sesuai kebutuhan -->
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="nameBackdrop" class="form-label">Keterangan</label>
                    <textarea 
                        name="keterangan" 
                        id="keterangan" 
                        cols="5" 
                        rows="3"
                        class="form-control"
                        placeholder="Contoh : Pengajuan Surat PKL"></textarea>
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

<!-- Modal Edit -->
<div class="modal fade" id="backDropEdit" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" enctype="multipart/form-data" method="post" action="{{ route('edit-layanan', '') }}" id="editLayananForm">
            @csrf
            <div class="modal-header">
                <h3 class="modal-title" id="backDropModalTitle">Edit Layanan Publik</h3>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body  text-black">
                <div class="row">
                    <div class="col-12 mb-2">
                        <label for="nameBackdrop" class="form-label">Nama Layanan Publik</label>
                        <input
                            type="text"
                            name="namaLayanan"
                            id="namaLayanan"
                            class="form-control"
                            placeholder="Contoh : Kantor Kecamatan"
                            
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="nameBackdrop" class="form-label">Deskripsi Layanan</label>
                        <textarea 
                            name="descLayanan" 
                            id="descLayanan" 
                            cols="5" 
                            rows="3"
                            class="form-control"
                            placeholder="Contoh : Layanan Kesehatan Utama Masyarakat" ></textarea>
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="nameBackdrop" class="form-label">Informasi Tambahan</label>
                        <textarea 
                            name="keterangan" 
                            id="keterangan" 
                            cols="5" 
                            rows="3"
                            class="form-control"
                            placeholder="Contoh : Poliklinik, Dokter Umum, Polsek" ></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Lokasi</label>
                        <input
                            type="text"
                            name="lokasi"
                            id="lokasi"
                            class="form-control"
                            placeholder="Contoh : Jl. Pramuka No. 12"
                            
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Kontak</label>
                        <input
                            type="text"
                            name="kontak"
                            id="kontak"
                            class="form-control"
                            placeholder="Contoh : 081332408340"
                            
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Jam Buka</label>
                        <input
                            type="time"
                            name="jam_operasional_buka"
                            id="jam_operasional_buka"
                            class="form-control"
                            placeholder="Contoh : Hari Jadi Kecamatan Balong"
                            
                        />
                    </div>
                    <div class="col-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Jam Tutup</label>
                        <input
                            type="time"
                            name="jam_operasional_tutup"
                            id="jam_operasional_tutup"
                            class="form-control"
                            placeholder="Contoh : Hari Jadi Kecamatan Balong"
                            
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Persyaratan</label>
                        <input
                            type="text"
                            name="persyaratan"
                            id="persyaratan"
                            class="form-control"
                            placeholder="Contoh : Membawa BPJS, KTP"
                            
                        />
                    </div>
                    <div class="col-6 mb-2">
                        <label for="nameBackdrop" class="form-label">Biaya</label>
                        <input
                            type="text"
                            name="biaya"
                            id="biaya"
                            class="form-control"
                            placeholder="Contoh : Gratis - Sesuai Ketentuan - 20000"
                            
                        />
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <label for="nameBackdrop" class="form-label">Kategori Layanan Publik</label>
                    <select name="kategoriLayanan" id="kategoriLayanan" class="form-control">
                        <option value="">-- Pilih Kategori Layanan --</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Kependudukan">Kependudukan</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Keamananan">Keamananan</option>
                        <option value="Perizinan dan Administrasi">Perizinan dan Administrasi</option>
                        <option value="Sosial">Sosial</option>
                        <option value="Kebersihan dan Lingkungan">Kebersihan dan Lingkungan</option>
                    </select>
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
        } 
        else {
            // Jika tidak tampil, set ukuran kolom jenisKeperluan menjadi col-md-12
            pegawaiOptions.style.display = "none";
            suratOptions.style.display = "none";
            jenisKeperluanContainer.classList.remove("col-md-6");
            jenisKeperluanContainer.classList.add("col-md-12");
        }
    }
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
</script>
<script>
    $(document).ready(function () {
        // Mendapatkan modal dan form
        var modal = $('#backDropEdit');
        var form = $('#editLayananForm');

        // Ketika tombol edit di klik
        $('.edit-layanan-btn').click(function () {
            var layananId = $(this).data('id'); // Mendapatkan nilai data-id    
            // Mengubah atribut action form dengan nilai layananId
            form.attr('action', '{{ route('edit-layanan', '') }}' + '/' + layananId);
            
            // Menampilkan modal
            modal.modal('show');
        });
    });
</script>

<!-- Detail -->
<script>
    $(document).ready(function() {
        $('#backDropDetail').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idLayanan = button.data('id');
            var namaLayanan = button.data('bs-nama');
            var descLayanan = button.data('bs-deskripsi');
            var keterangan = button.data('bs-informasi');
            var lokasi = button.data('bs-lokasi');
            var kontak = button.data('bs-kontak');
            var jamOperasional = button.data('bs-jam');
            var persyaratan = button.data('bs-persyaratan');
            var biaya = button.data('bs-biaya');
            var kategoriLayanan = button.data('bs-kategori');

            var modal = $(this);
            modal.find('#idLayanan').val(idLayanan);
            modal.find('#namaLayanan').val(namaLayanan);
            modal.find('#descLayanan').val(descLayanan);
            modal.find('#keterangan').val(keterangan);
            modal.find('#lokasi').val(lokasi);
            modal.find('#kontak').val(kontak);
            modal.find('#jam_operasional').val(jamOperasional);
            modal.find('#persyaratan').val(persyaratan);
            modal.find('#biaya').val(biaya);
            modal.find('#kategoriLayanan').val(kategoriLayanan);
        });
    });
    $(document).ready(function() {
        $('#backDropEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idLayanan = button.data('id');
            var namaLayanan = button.data('bs-nama');
            var descLayanan = button.data('bs-deskripsi');
            var keterangan = button.data('bs-informasi');
            var lokasi = button.data('bs-lokasi');
            var kontak = button.data('bs-kontak');
            var jamOperasional = button.data('bs-jam');
            var persyaratan = button.data('bs-persyaratan');
            var biaya = button.data('bs-biaya');
            var kategoriLayanan = button.data('bs-kategori');

            // Memisahkan nilai jam_operasional menjadi jam_buka dan jam_tutup
            var jamBuka = jamOperasional.split('-')[0];
            var jamTutup = jamOperasional.split('-')[1];

            var modal = $(this);
            modal.find('#idLayanan').val(idLayanan);
            modal.find('#namaLayanan').val(namaLayanan);
            modal.find('#descLayanan').val(descLayanan);
            modal.find('#keterangan').val(keterangan);
            modal.find('#lokasi').val(lokasi);
            modal.find('#kontak').val(kontak);
            modal.find('#jam_operasional_buka').val(jamBuka);
            modal.find('#jam_operasional_tutup').val(jamTutup);
            modal.find('#persyaratan').val(persyaratan);
            modal.find('#biaya').val(biaya);
            modal.find('#kategoriLayanan').val(kategoriLayanan);
        });
    });
    
</script>
@endsection