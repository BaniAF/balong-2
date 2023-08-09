@section('title')
    LAYANAN PUBLIK - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')

@section('content')
    @include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Dashboard /</span> Layanan Publik</h6>
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
                <h5 class="fw-semibold">Daftar Layanan Publik</h5>
                <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#backDropModal" type="button">
                    <i class='bx bxs-file-plus me-2'></i>Tambah Layanan
                </button>
            </div>
            <table class="table table-bordered">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th style="width: 20px">No</th>
                        <th>Nama Layanan</th>
                        <th>Keterangan Layanan</th>
                        <th>Informasi Tambahan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @if ($layanan->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center fw-semibold">Belum ada Pelayanan</td>
                        </tr>
                    @else
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($layanan as $layananP)
                            @php
                                $layananId = $layananP->id;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $counter }}</td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm fw-bolder multiline">{{ $layananP->namaLayanan }}</h6>
                                        <p class="text-s text-secondary mb-0">{{ $layananP->kategoriLayanan }} -
                                            {{ $layananP->lokasi }}</p>
                                    </div>
                                </td>
                                <td>{{ $layananP->descLayanan }}</td>
                                <td>{{ $layananP->keterangan }}</td>
                                <td class="text-center aligns-item-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center posting-form">
                                        <button
                                            class="tf-icons btn btn-sm btn-outline-warning me-1 btn-icon rounded-pill edit-layanan-btn"
                                            type="button" data-bs-toggle="modal" data-bs-target="#backDropEdit"
                                            data-id="{{ $layananP->id }}" data-bs-nama="{{ $layananP->namaLayanan }}"
                                            data-bs-deskripsi="{{ $layananP->descLayanan }}"
                                            data-bs-informasi="{{ $layananP->keterangan }}"
                                            data-bs-lokasi="{{ $layananP->lokasi }}"
                                            data-bs-kontak="{{ $layananP->kontak }}"
                                            data-bs-jam="{{ $layananP->jam_operasional }}"
                                            data-bs-persyaratan="{{ $layananP->persyaratan }}"
                                            data-bs-biaya="{{ $layananP->biaya }}"
                                            data-bs-kategori="{{ $layananP->kategoriLayanan }}" data-bs-offset="0,4"
                                            data-bs-placement="bottom" data-bs-html="true" title="<span>Edit</span>">
                                            <i class="bx bx-edit-alt bx-s m-1"></i>
                                        </button>
                                        <button
                                            class="tf-icons btn btn-sm btn-outline-primary me-1 btn-icon rounded-pill btn-detail"
                                            type="button" data-bs-toggle="modal" data-bs-target="#backDropDetail"
                                            data-id="{{ $layananP->id }}" data-bs-nama="{{ $layananP->namaLayanan }}"
                                            data-bs-deskripsi="{{ $layananP->descLayanan }}"
                                            data-bs-informasi="{{ $layananP->keterangan }}"
                                            data-bs-lokasi="{{ $layananP->lokasi }}"
                                            data-bs-kontak="{{ $layananP->kontak }}"
                                            data-bs-jam="{{ $layananP->jam_operasional }}"
                                            data-bs-persyaratan="{{ $layananP->persyaratan }}"
                                            data-bs-biaya="{{ $layananP->biaya }}"
                                            data-bs-kategori="{{ $layananP->kategoriLayanan }}" data-bs-offset="0,4"
                                            data-bs-placement="bottom" data-bs-html="true" title="<span>Detail</span>">
                                            <i class='bx bxs-detail'></i>
                                        </button>
                                        <form action="{{ route('layanan-hapus', $layananP->id) }}" method="post">
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
    <!-- Modal Tambah Posting -->
    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="post"
                action="{{ route('tambah-layanan') }}">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Tambah Layanan Publik</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nameBackdrop" class="form-label">Nama Layanan Publik</label>
                            <input type="text" name="namaLayanan" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : Kantor Kecamatan" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label for="nameBackdrop" class="form-label">Deskripsi Layanan</label>
                            <textarea name="descLayanan" id="descLayanan" cols="5" rows="3" class="form-control"
                                placeholder="Contoh : Layanan Kesehatan Utama Masyarakat"></textarea>
                        </div>
                        <div class="mb-2 col-md-6">
                            <label for="nameBackdrop" class="form-label">Informasi Tambahan</label>
                            <textarea name="keterangan" id="keterangan" cols="5" rows="3" class="form-control"
                                placeholder="Contoh : Poliklinik, Dokter Umum, Polsek"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : Jl. Pramuka No. 12" />
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Kontak</label>
                            <input type="text" name="kontak" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : 081332408340" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Jam Buka</label>
                            <input type="time" name="jam_operasional_buka" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : Hari Jadi Kecamatan Balong" />
                        </div>
                        <div class="col-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Jam Tutup</label>
                            <input type="time" name="jam_operasional_tutup" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : Hari Jadi Kecamatan Balong" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Persyaratan</label>
                            <input type="text" name="persyaratan" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : Membawa BPJS, KTP" />
                        </div>
                        <div class="col-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Biaya</label>
                            <input type="text" name="biaya" id="nameBackdrop" class="form-control"
                                placeholder="Contoh : Gratis - Sesuai Ketentuan - 20000" />
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="nameBackdrop" class="form-label">Kategori Layanan Publik</label>
                        <select name="kategoriLayanan" id="" class="form-control">
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

    <!-- Modal Detail -->
    <div class="modal fade" id="backDropDetail" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="post"
                action="{{ route('tambah-layanan') }}">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Detail Layanan Publik</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  text-black">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nameBackdrop" class="form-label">Nama Layanan Publik</label>
                            <input type="text" name="namaLayanan" id="namaLayanan" class="form-control"
                                placeholder="Contoh : Kantor Kecamatan" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label for="nameBackdrop" class="form-label">Deskripsi Layanan</label>
                            <textarea name="descLayanan" id="descLayanan" cols="5" rows="3" class="form-control"
                                placeholder="Contoh : Layanan Kesehatan Utama Masyarakat" readonly></textarea>
                        </div>
                        <div class="mb-2 col-md-6">
                            <label for="nameBackdrop" class="form-label">Informasi Tambahan</label>
                            <textarea name="keterangan" id="keterangan" cols="5" rows="3" class="form-control"
                                placeholder="Contoh : Poliklinik, Dokter Umum, Polsek" readonly></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                placeholder="Contoh : Jl. Pramuka No. 12" readonly />
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Kontak</label>
                            <input type="text" name="kontak" id="kontak" class="form-control"
                                placeholder="Contoh : 081332408340" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Persyaratan</label>
                            <input type="text" name="persyaratan" id="persyaratan" class="form-control"
                                placeholder="Contoh : Membawa BPJS, KTP" readonly />
                        </div>
                        <div class="col-3 mb-2">
                            <label for="nameBackdrop" class="form-label">Biaya</label>
                            <input type="text" name="biaya" id="biaya" class="form-control"
                                placeholder="Contoh : Gratis - Sesuai Ketentuan - 20000" readonly />
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="nameBackdrop" class="form-label">Jam Operasional</label>
                            <input type="text" name="jam_operasional" id="jam_operasional" class="form-control"
                                placeholder="Contoh : Hari Jadi Kecamatan Balong" readonly />
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="nameBackdrop" class="form-label">Kategori Layanan Publik</label>
                        <input type="text" name="kategoriLayanan" id="kategoriLayanan" class="form-control"
                            placeholder="Contoh : Gratis - Sesuai Ketentuan - 20000" readonly />
                    </div>
                </div>
                <div class="modal-footer d-flex mt-1">
                    <button type="button" class="btn btn-outline-danger mb-0" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="backDropEdit" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" enctype="multipart/form-data" method="post"
                action="{{ route('edit-layanan', '') }}" id="editLayananForm">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title" id="backDropModalTitle">Edit Layanan Publik</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  text-black">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nameBackdrop" class="form-label">Nama Layanan Publik</label>
                            <input type="text" name="namaLayanan" id="namaLayanan" class="form-control"
                                placeholder="Contoh : Kantor Kecamatan" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label for="nameBackdrop" class="form-label">Deskripsi Layanan</label>
                            <textarea name="descLayanan" id="descLayanan" cols="5" rows="3" class="form-control"
                                placeholder="Contoh : Layanan Kesehatan Utama Masyarakat"></textarea>
                        </div>
                        <div class="mb-2 col-md-6">
                            <label for="nameBackdrop" class="form-label">Informasi Tambahan</label>
                            <textarea name="keterangan" id="keterangan" cols="5" rows="3" class="form-control"
                                placeholder="Contoh : Poliklinik, Dokter Umum, Polsek"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                placeholder="Contoh : Jl. Pramuka No. 12" />
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Kontak</label>
                            <input type="text" name="kontak" id="kontak" class="form-control"
                                placeholder="Contoh : 081332408340" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Jam Buka</label>
                            <input type="time" name="jam_operasional_buka" id="jam_operasional_buka"
                                class="form-control" placeholder="Contoh : Hari Jadi Kecamatan Balong" />
                        </div>
                        <div class="col-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Jam Tutup</label>
                            <input type="time" name="jam_operasional_tutup" id="jam_operasional_tutup"
                                class="form-control" placeholder="Contoh : Hari Jadi Kecamatan Balong" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Persyaratan</label>
                            <input type="text" name="persyaratan" id="persyaratan" class="form-control"
                                placeholder="Contoh : Membawa BPJS, KTP" />
                        </div>
                        <div class="col-6 mb-2">
                            <label for="nameBackdrop" class="form-label">Biaya</label>
                            <input type="text" name="biaya" id="biaya" class="form-control"
                                placeholder="Contoh : Gratis - Sesuai Ketentuan - 20000" />
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
    <script>
        $(document).ready(function() {
            // Mendapatkan modal dan form
            var modal = $('#backDropEdit');
            var form = $('#editLayananForm');

            // Ketika tombol edit di klik
            $('.edit-layanan-btn').click(function() {
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
