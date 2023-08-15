@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    Profil
@endsection

@section('content')
    <div class="container m-2 p-4">
        <div>
            <h1 class="font-bold text-3xl">Visi</h1>
            <p> {!! $Profil->visi !!}</p>
        </div>
        <div>
            <h1 class="font-bold text-3xl">Misi</h1>
            <p> {!! $Profil->misi!!}</p>
        </div>
        <div>
            <h1 class="font-bold text-3xl">Sasaran</h1>
            <p> {!! $Profil->sasaran!!}</p>
        </div>
        <div>
            <h1 class="font-bold text-3xl">Tujuan</h1>
            <p> {!! $Profil->tujuan!!}</p>
        </div>

        <div>
            <h1 class="font-bold text-3xl">Struktur Organisasi</h1>
            <p> {!! $Profil->ketStruktur!!}</p>
            @if ($Profil->fileStruktur && pathinfo($Profil->fileStruktur, PATHINFO_EXTENSION) === 'pdf')
                <div class="m-2 p-2">
                    <iframe src="{{ asset('uploads/File/' . $Profil->fileStruktur) }}" width="100%" height="600px"></iframe>
                </div>
            @else
            <p class="text-gray-100">tidak ada dokumen yang ditampilkan</p>
            @endif
        </div>

        <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
    </div>
@endsection

