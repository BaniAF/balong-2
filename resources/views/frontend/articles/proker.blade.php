@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    {{ $program->namaProker }}
@endsection

@section('content')
    <div class="container m-2 p-4">
        <h1>Detail Program Kerja</h1>
        <p>ID: {{ $program->id }}</p>
        <h1 class="font-bold text-5xl">{{ $program->namaProker }}</h1>
        <p>Nama Program: {{ $program->namaProker }}</p>
        {{-- @if ($program->fileProgram && pathinfo($program->fileProgram, PATHINFO_EXTENSION) === 'pdf')
            <p>File Terkait:</p>
            <iframe
                src="{{ asset('js/pdf.js/web/viewer.html?file=' . urlencode(asset('uploads/File/' . $program->fileProgram))) }}"
                width="100%" height="600px"></iframe>
        @else
            @if ($program->fileProgram)
                <p>File Terkait: <a href="{{ asset('uploads/File/' . $program->fileProgram) }}"
                        target="_blank">{{ $program->fileProgram }}</a></p>
            @else
                <p>Tidak ada file terkait.</p>
            @endif
        @endif --}}

        @if ($program->fileProgram && pathinfo($program->fileProgram, PATHINFO_EXTENSION) === 'pdf')
            <p>File Terkait: {{ $program->fileProgram }}</p>
            <div class="m-2 p-2">
                <iframe src="{{ asset('uploads/File/' . $program->fileProgram) }}" width="100%" height="600px"></iframe>
                {{-- <embed src="{{ asset('uploads/File/' . $program->fileProgram) }}" type="application/pdf" width="100%"
                height="600px"> --}}
            </div>
        @else
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, soluta debitis nulla velit magni iure, facere
                consequuntur nostrum vero est aut nemo veritatis dolorum omnis odit culpa hic deleniti voluptate.</p>
        @endif
        <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
    </div>
@endsection
