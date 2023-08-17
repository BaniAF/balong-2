@extends('frontend.layouts.app')

@section('title')
GALERI
@endsection

@section('content')
<div class="flex flex-col md:flex-row">
    <div class="m-2 p-4">
        <h1 class="font-bold text-2xl">Program Kerja</h1>
        <div class="flex flex-wrap gap-2">
            @foreach ($galeri as $item)
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 h-auto m-2">
                <img src="{{ asset('uploads/Foto-Kegiatan/' . $item->image) }}" alt="Program Kerja Image"
                    class="w-full h-auto">
            </div>
            @endforeach
        </div>
    </div>
    <div class="m-2 p-4">
        <h1 class="font-bold text-2xl">Postingan</h1>
        <div class="flex flex-wrap gap-2">
            @foreach ($posting as $item)
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 h-auto m-2">
                <img src="{{ asset('uploads/Artikel/' . $item->fotoPost) }}" alt="Article Image" class="w-full h-auto">
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection