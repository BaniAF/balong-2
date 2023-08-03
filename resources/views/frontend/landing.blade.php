@extends('frontend.layouts.app')

@section('content')
    {{-- slider --}}

    {{-- endslider --}}
    <div class="flex">
        {{-- hero section --}}
        <div class="flex">
            <div class="hero bg-blue-400 ml-20 px-6 mx-3 mt-3">
                <div class="hero-content flex-col justify-items-center">
                    <img src="https://source.unsplash.com/random/800x600/?2" class="max-w-sm rounded-lg shadow-2xl" />
                    <div class="align-baseline">
                        @foreach ($artikel->take(1) as $article)
                            <h1 class="text-2xl font-bold hover:text-red-500 justify-items-center">
                                <a href="{{ route('articles.show', $article) }}">{{ $article->judulPost }}</a>
                            </h1>
                            <p class="py-2">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                                exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- end hero section --}}
        <div class="divider lg:divider-horizontal p-4"></div>
        {{-- weather --}}
        {{-- <div class="mt-8 ml-15 mr-10 w-1/3">
            <div class="flex flex-col bg-white rounded p-4 w-full max-w-xs">
                <div class="font-bold text-2xl">{{ $weather['name'] }}</div>
                @php
                    setlocale(LC_TIME, 'id_ID');
                    $tanggal = \Carbon\Carbon::now()->formatLocalized('%A, %d %B %Y');
                @endphp
                <div class="text-sm text-gray-500"> {{ $tanggal }}</div>
                <div class="flex flex-row items-center justify-center mt-6">
                    <div class="font-bold text-7xl text-blue-500"> {{ floor($weather['main']['temp']) }} &deg;C
                    </div>
                </div>
                <div class="flex items-end jus ml-6">
                    <div class="text-xl">{{ $weather['weather'][0]['description'] }}</div>
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <div class="flex flex-col items-center">
                        <div class="font-medium text-sm">Kecepatan Angin</div>
                        <div class="text-sm text-gray-500">{{ $weather['wind']['speed'] }} m/s</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="font-medium text-sm">Kelembapan</div>
                        <div class="text-sm text-gray-500">{{ $weather['main']['humidity'] }}%</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="font-medium text-sm">Visibilitas</div>
                        <div class="text-sm text-gray-500">{{ $weather['visibility'] / 1000 }} km</div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- end weather --}}
    </div>

    {{-- main --}}
    <div class="flex">
        {{-- isi dari berita utama --}}
        <div class="flex flex-wrap gap-1 bg-green-400 ml-9 my-4 mr-2 w-2/3 items-center justify-center">
            {{-- kolom berita --}}
            @foreach ($artikel as $article)
                <div class="p-2 my-1  ">
                    <div class="card bg-gray-500 dark:bg-white shadow-xl w-48 items-center">
                        <figure class="">
                            <img src="https://source.unsplash.com/random/800x600/?1" alt="Gambar Berita" class="lazyload" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title dark:text-black text-white hover:text-red-500 text-sm">
                                <a href="{{ route('post.show', $article) }}">{{ $article->judulPost }}</a>
                            </h2>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>
            @endforeach
        </div>

        {{-- isi dari bagian pengumuman --}}
        <div class="bg-red-500 flex-1 w-1/3 mr-12 my-4 ml-1 p-5 md:w-">
            @foreach ($pengumuman as $pengumumanItem)
                <div>
                    @if ($pengumumanItem->image)
                        <img src="{{ asset('images/' . $pengumumanItem->image) }}" alt="Pengumuman Image"
                            class="w-auto h-96 scale-95">
                    @endif
                    <h2>ini bagian pengumuman</h2>
                </div>
            @endforeach
        </div>
    </div>
@endsection
