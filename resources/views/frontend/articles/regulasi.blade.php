@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    {{ $Regulasi->namaRegulasi }}
@endsection

@section('content')
    <div class="container m-2 p-4">
        <h1 class="font-bold text-3xl">{{ $Regulasi->namaRegulasi }}</h1>
        <p> {{ $Regulasi->descRegulasi }}</p>
        @if ($Regulasi->fileRegulasi && pathinfo($Regulasi->fileRegulasi, PATHINFO_EXTENSION) === 'pdf')
            <div class="m-2 p-2">
                <iframe src="{{ asset('uploads/File/' . $Regulasi->fileRegulasi) }}" width="100%" height="600px"></iframe>
            </div>
        @else
        <p class="text-gray-100">tidak ada dokumen yang ditampilkan</p>
        @endif
        <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
    </div>
@endsection
