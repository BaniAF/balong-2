@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    {{ $bidang->namaBidang }}
@endsection

@section('content')
    <div class="container m-2 p-4">
        <h1>Detail bidang Kerja</h1>
        <p>ID: {{ $bidang->id }}</p>
        <h1 class="font-bold text-5xl">{{ $bidang->namaBidang }}</h1>
        <p>Nama bidang: {{ $bidang->descBidang }}</p>
        {{-- @if ($bidang->fileBidang && pathinfo($bidang->fileBidang, PATHINFO_EXTENSION) === 'pdf')
            <p>File Terkait:</p>
            <iframe
                src="{{ asset('js/pdf.js/web/viewer.html?file=' . urlencode(asset('uploads/File/' . $bidang->fileBidang))) }}"
                width="100%" height="600px"></iframe>
        @else
            @if ($bidang->fileBidang)
                <p>File Terkait: <a href="{{ asset('uploads/File/' . $bidang->fileBidang) }}"
                        target="_blank">{{ $bidang->fileBidang }}</a></p>
            @else
                <p>Tidak ada file terkait.</p>
            @endif
        @endif --}}

        @if ($bidang->fileBidang && pathinfo($bidang->fileBidang, PATHINFO_EXTENSION) === 'pdf')
            <div class="m-2 p-2">
                <iframe src="{{ asset('uploads/File/' . $bidang->fileBidang) }}" width="100%" height="600px"></iframe>
                {{-- <embed src="{{ asset('uploads/File/' . $bidang->fileBidang) }}" type="application/pdf" width="100%"
                height="600px"> --}}
            </div>
        @else
            <p class="text-gray-100">tidak ada dokumen yang ditampilkan</p>
        @endif
        <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
    </div>
@endsection
