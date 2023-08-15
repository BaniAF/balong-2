@extends('frontend.layouts.app')
@section('content')
    <div class="flex mx-10 my-10 ">
        {{-- isi dari berita --}}
        <div class="w-2/3 mx-5 p-4 my-5">
            <h1 class="font-bold text-4xl p-1"> Judul Artikel : {{ $article->judulPost }}</h1>
            <h2 class="font-bold p-1"> . kategori : {{ $article->kategori->namaKategori }}</h2>
            @if ($article->fotoPost)
            <div class="w-2/3 h-auto">
                <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" alt="Article Image">
            </div>
            @endif

            <p>{!! $article->isiPost !!}</p>
        </div>

        {{-- isi dari berita terkait --}}
        <div class="w-1/3 p-5 mr-10 ml-5 my-1 border-2">
            <div class="border-l-4 border-indigo-500 p-4 ">
                <h3 class="text-md font-bold md:font-normal text-md sm:text-md">Artikel Terkait:</h3>
            </div>
            <div class="">
                <ul>
                    @foreach ($relatedArticles as $relatedArticle)
                        <div class="grid grid-cols-1 hover:text-yellow-300 mt-4">
                            <li class="text-sm p-0">
                                <a href="{{ route('post.show', $relatedArticle) }}">{{ $relatedArticle->judulPost }}</a>
                                <div class="divider m-1"></div>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
