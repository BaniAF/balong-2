@extends('frontend.layouts.app')
@section('content')
    <div class="flex mx-10 my-10 ">
        {{-- isi dari berita --}}
        <div class="w-2/3 mx-5 p-4 my-5">
            <h1 class="font-bold text-4xl p-1"> Judul Artikel : {{ $article->judulPost }}</h1>
            <h2 class="font-bold p-1"> . kategori : {{ $article->kategori->namaKategori }}</h2>
            @if ($article->fotoPost)
                <img src="{{ asset('uploads/' . $article->fotoPost) }}" alt="Article Image">
            @endif

            <p>{!! $article->isiPost !!}</p>

            {{-- <!-- Cek apakah isi artikel adalah file PDF atau dokumen -->
            @if (Str::endsWith($article->isiArtikel, ['.pdf', '.doc', '.docx', '.ppt', '.pptx', '.xls', '.xlsx']))
                <embed src="{{ asset('documents/' . $article->isiArtikel) }}" type="application/pdf" width="100%"
                    height="600px">
            @elseif (Str::endsWith($article->isiArtikel, ['.mp4', '.avi', '.mkv', '.mov', '.wmv']))
                <!-- Cek apakah isi artikel adalah file video -->
                <video controls width="100%" height="auto">
                    <source src="{{ asset('videos/' . $article->isiArtikel) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <!-- Jika isi artikel bukan file PDF, dokumen, atau video -->
            @endif --}}
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
                                <a href="{{ route('post.show', $relatedArticle) }}">{{ $relatedArticle->judulArtikel }}</a>
                                <div class="divider m-1"></div>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
