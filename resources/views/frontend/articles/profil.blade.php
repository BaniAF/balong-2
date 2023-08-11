@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    {{ $Profil->namaProfil }}
@endsection

@section('content')
    <div class="container m-2 p-4">
        <h1>Detail Profil Kerja</h1>
        <p>ID: {{ $Profil->id }}</p>
        <h1 class="font-bold text-5xl">{{ $Profil->namaProfil }}</h1>
        <p>Nama Profil: {{ $Profil->namaProfil }}</p>
        @if ($Profil->fileProfil && pathinfo($Profil->fileProfil, PATHINFO_EXTENSION) === 'pdf')
            <p>File Terkait: {{ $Profil->fileProfil }}</p>
            <div class="m-2 p-2">
                <iframe src="{{ asset('uploads/File/' . $Profil->fileProfil) }}" width="100%" height="600px"></iframe>
                {{-- <embed src="{{ asset('uploads/File/' . $Profil->fileProfil) }}" type="application/pdf" width="100%"
                height="600px"> --}}
            </div>
        @else
            <p>Dokumen Kosong</p>
        @endif
        <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
    </div>
@endsection

<div
    class="flex items-center justify-between p-6 border-l-8 sm:py-8 dark:border-amber-400 dark:bg-gray-900 dark:text-gray-100">
    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus?</span>
</div>
