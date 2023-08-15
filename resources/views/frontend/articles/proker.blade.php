@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    {{ $program->namaProker }}
@endsection

@section('content')
    <div class="container m-2 p-4">
        <h1 class="font-bold text-3xl">{{ $program->namaProker }}</h1>
        @if ($program->fileProgram && pathinfo($program->fileProgram, PATHINFO_EXTENSION) === 'pdf')
            <div class="m-2 p-2 justify-center items-center">
                <iframe src="{{ asset('uploads/File/' . $program->fileProgram) }}" width="80%" height="600px"></iframe>
            </div>
        @else
        <p class="text-gray-100">tidak ada dokumen yang ditampilkan</p>
        @endif
        <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
    </div>
@endsection
