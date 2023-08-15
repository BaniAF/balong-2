@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    GALERI
@endsection

@section('content')
<div class="flex-ro ">
    <div class="m-2 p-4 flex">
        <h1 class="font-bold text-2xl">Program Kerja</h1>
        @foreach ($galeri as $item)
            <div class="w-96 h-auto m-2">
            <img src="{{ asset('uploads/Foto-Kegiatan/' . $item->image) }}" alt="">
            </div>
        @endforeach

    </div>
    <div class="m-2 p-4 flex gap-1">
        <h1 class="font-bold text-2xl">Postingan</h1>
        @foreach ($posting as $item)
            <div class="w-96 h-auto m-2">
                <img src="{{ asset('uploads/Artikel/' . $item->fotoPost) }}" alt="Article Image">
            </div>
        @endforeach
    </div>
</div>
@endsection
