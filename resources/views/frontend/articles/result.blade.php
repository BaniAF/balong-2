@extends('frontend.layouts.app')
@section('content')
<div class="flex mx-10 my-1 ">
    {{-- isi dari berita --}}
    @foreach($articles as $article)
    <div class="w-2/3 mx-5 p-4 my-5 ">
        <h1 class="font-bold text-2xl p-1 hover:text-red-500"><a href="{{ route('post.show', $article) }}">{{
                $article->judulPost }}</a>
        </h1>
        @if ($article->fotoPost)
        <div class="w-2/3 h-auto">
            <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" alt="Article Image">
        </div>
        @endif
    </div>
    @endforeach

    @endsection