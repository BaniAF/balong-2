@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    {{ $Regulasi->namaRegulasi }}
@endsection

@section('content')
    <div class="container m-2 p-4">
        <h1>Detail Regulasi Kerja</h1>
        <p>ID: {{ $Regulasi->id }}</p>
        <h1 class="font-bold text-5xl">{{ $Regulasi->namaRegulasi }}</h1>
        <p>Nama Regulasi: {{ $Regulasi->namaRegulasi }}</p>
        {{-- @if ($Regulasi->fileRegulasi && pathinfo($Regulasi->fileRegulasi, PATHINFO_EXTENSION) === 'pdf')
            <p>File Terkait:</p>
            <iframe
                src="{{ asset('js/pdf.js/web/viewer.html?file=' . urlencode(asset('uploads/File/' . $Regulasi->fileRegulasi))) }}"
                width="100%" height="600px"></iframe>
        @else
            @if ($Regulasi->fileRegulasi)
                <p>File Terkait: <a href="{{ asset('uploads/File/' . $Regulasi->fileRegulasi) }}"
                        target="_blank">{{ $Regulasi->fileRegulasi }}</a></p>
            @else
                <p>Tidak ada file terkait.</p>
            @endif
        @endif --}}

        @if ($Regulasi->fileRegulasi && pathinfo($Regulasi->fileRegulasi, PATHINFO_EXTENSION) === 'pdf')
            <p>File Terkait: {{ $Regulasi->fileRegulasi }}</p>
            <div class="m-2 p-2">
                <iframe src="{{ asset('uploads/File/' . $Regulasi->fileRegulasi) }}" width="100%" height="600px"></iframe>
                {{-- <embed src="{{ asset('uploads/File/' . $Regulasi->fileRegulasi) }}" type="application/pdf" width="100%"
                height="600px"> --}}
            </div>
        @else
            <p>Dokumen Kosong</p>
        @endif
        <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
    </div>
@endsection
