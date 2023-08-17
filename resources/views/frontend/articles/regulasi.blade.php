@extends('frontend.layouts.app')

@section('title')
{{ $Regulasi->namaRegulasi }}
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="font-bold text-3xl text-center">{{ $Regulasi->namaRegulasi }}</h1>
    <p class="mt-4 text-lg">{{ $Regulasi->descRegulasi }}</p>
    @if ($Regulasi->fileRegulasi && pathinfo($Regulasi->fileRegulasi, PATHINFO_EXTENSION) === 'pdf')
    <div class="mt-4">
        <iframe src="{{ asset('uploads/File/' . $Regulasi->fileRegulasi) }}" class="w-full h-auto"
            style="min-height: 400px;"></iframe>
    </div>
    @else
    <p class="text-gray-400 mt-4">Tidak ada dokumen yang ditampilkan</p>
    @endif
    <!-- Tampilkan detail Regulasi lainnya sesuai kebutuhan -->
</div>
@endsection