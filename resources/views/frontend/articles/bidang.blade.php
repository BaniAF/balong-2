@extends('frontend.layouts.app')

@section('title')
{{ $bidang->namaBidang }}
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="font-bold text-3xl text-center">{{ $bidang->namaBidang }}</h1>
    <p class="mt-4 text-lg">{{ $bidang->descBidang }}</p>
    @if ($bidang->fileBidang && pathinfo($bidang->fileBidang, PATHINFO_EXTENSION) === 'pdf')
    <div class="mt-4">
        <iframe src="{{ asset('uploads/File/' . $bidang->fileBidang) }}" class="w-full h-auto"
            style="min-height: 400px;"></iframe>
    </div>
    @else
    <p class="text-gray-400 mt-4">Tidak ada dokumen yang ditampilkan</p>
    @endif
    <!-- Tampilkan detail Regulasi lainnya sesuai kebutuhan -->
</div>
@endsection