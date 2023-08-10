@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    LAYANAN PUBLIK
@endsection

@section('content')
    <div class="container m-2 p-4">
        @foreach ($publik as $item)
            <h1>Detail publik Layanan</h1>
            <p>ID: {{ $item->id }}</p>
            <h1 class="font-bold text-5xl">{{ $item->namaLayanan }}</h1>
            <p>Nama publik: {{ $item->namaLayanan }}</p>
        @endforeach


    </div>
@endsection
