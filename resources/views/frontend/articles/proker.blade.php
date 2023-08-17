@extends('frontend.layouts.app')

@section('title')
{{ $program->namaProker }}
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="font-bold text-3xl">{{ $program->namaProker }}</h1>
    <p class="mt-4 text-lg">{{ $program->descProker }}</p>
    @if ($program->fileProgram && pathinfo($program->fileProgram, PATHINFO_EXTENSION) === 'pdf')
    <div class="mt-4">
        <iframe src="{{ asset('uploads/File/' . $program->fileProgram) }}" class="w-full h-auto"
            style="min-height: 500px;"></iframe>
    </div>
    @else
    <p class="text-gray-400 mt-4">Tidak ada dokumen yang ditampilkan</p>
    @endif
    <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
</div>
@endsection