@section('title')
    DASHBOARD - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')

@section('content')
    @include('sweetalert::alert')

    <div class="col-lg-12 mb-3 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-10 col-lg-9">
                    <div class="card-body">
                        <h2 class="card-title fw-bold text-primary">Selamat Datang, {{ Auth::user()->namaUser }}.</h2>
                        <p class="mb-4">
                            <span class="fw-bold">SIBALO</span> adalah sistem informasi backend yang bertujuan untuk mengelola
                            informasi berita dan profil kecamatan Balong secara efisien dan terintegrasi.
                        </p>
                    </div>
                </div>
                <div class="col-sm-2 xt-center text-sm-left text-end">
                    <div class="card-body">
                        <img src="../assets/img/logo-kominfo.png" height="140" alt="Logo Kominfo"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h6 class="fw-bold mb-3">Pages</h6>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card shadow h-auto p-0">
                <div class="card-body">
                    <span class="fw-bold d-block mb-1 text-primary">Total Artikel</span>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPost }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card shadow h-auto p-0">
                <div class="card-body">
                    <span class="fw-bold d-block mb-1 text-primary">Total Program Kegiatan</span>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProker }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card shadow h-auto p-0">
                <div class="card-body">
                    <span class="fw-bold d-block mb-1 text-primary">Total Layanan Publik</span>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLayanan }}</div>
                </div>
            </div>
        </div>
    </div>
    <h6 class="fw-bold mb-3">Kelola</h6>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card shadow h-auto p-0">
                <div class="card-body">
                    <span class="fw-bold d-block mb-1 text-primary">Total Pegawai</span>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPegawai }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card shadow h-auto p-0">
                <div class="card-body">
                    <span class="fw-bold d-block mb-1 text-primary">Total Kunjungan</span>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTamu }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
