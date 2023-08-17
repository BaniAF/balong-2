@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    {{ $program->namaProker }}
@endsection

@section('content')
    <div class="container m-4 p-4">
        <h1 class="font-bold text-3xl ml-10">{{ $program->namaProker }}</h1>
        <p class="ml-14 text-lg">{{ $program->descProker }}</p>
        @if ($program->fileProgram && pathinfo($program->fileProgram, PATHINFO_EXTENSION) === 'pdf')
            <div class="m-2 p-2 flex justify-center items-center mt-4">
                <iframe src="{{ asset('uploads/File/' . $program->fileProgram) }}" width="80%" height="800px"></iframe>
            </div>
        @else
        <p class="text-gray-100">tidak ada dokumen yang ditampilkan</p>
        @endif
        <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
    </div>
@endsection
