@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    GALERI
@endsection

@section('content')
    <div class="container m-2 p-4">
        @foreach ($galeri as $item)
            <h1>Detail publik Layanan</h1>
            <p>ID: {{ $item->id }}</p>
            <h1 class="font-bold text-5xl">{{ $item->proker->namaProker }}</h1>
            <p>Nama publik: {{ $item->proker->namaProker }}</p>
            <img src="{{ asset('uploads/Foto-Kegiatan/' . $item->image) }}" alt="">
        @endforeach


    </div>
    <div class="container m-2 p-4">
        @foreach ($posting as $item)
            <h1>Detail publik Layanan</h1>
            <p>ID: {{ $item->id }}</p>
            <h1 class="font-bold text-5xl">{{ $item->judulPost }}</h1>
            <p>Nama publik: {{ $item->judulPost }}</p>
            <img src="{{ asset('uploads/Artikel/' . $item->fotoPost) }}" alt="">
        @endforeach


    </div>
@endsection
