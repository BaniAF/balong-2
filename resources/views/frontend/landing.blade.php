@extends('frontend.layouts.app')
@section('title')
Pemerintah Kecamatan Balong
@endsection
@push('style')
@livewireStyles
@endpush
@push('script')
@livewireScripts
@endpush


@section('content')
{{-- slider --}}

{{-- endslider --}}
<div class="flex">
    {{-- hero section --}}
    <div class="flex justify-center">
        <div class="hero bg-white ml-14 px-3 mx-1 mt-5 rounded shadow-xl">
            <div class="hero-content flex-col justify-items-center">
                @foreach ($artikel->take(1) as $article)
                <div class="rounded-lg overflow-hidden" style="height: 400px; width: 800px;">
                    <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" alt="Image" class=" object-cover" />
                </div>
                <div class="align-baseline">
                    <h1 class="text-2xl font-bold hover:text-red-500 justify-items-center">
                        <a href="{{ route('articles.show', $article) }}">{{ $article->judulPost }}</a>
                    </h1>
                    <p> {!! Str::limit(strip_tags($article->isiPost), 100) !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- end hero section --}}
    <div class="divider lg:divider-horizontal -p-4"></div>
    {{-- weather --}}
    <div class="mt-8 ml-15 mr-10 w-1/3">
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
    </div>
    {{-- end weather --}}
</div>

{{-- main --}}
<div class="flex">
    {{-- berita atas --}}
    <div class="flex flex-wrap gap-1  ml-24 my-4 mr-2 w-2/3 bg-white p-4 rounded-lg shadow-md">
        <div class="border-l-4 border-indigo-500 p-2 justify-start text-left h-10 mt-5 mb-4 ml-5 mr-44">
            <h3 class="text-2xl font-extrabold md:font-normal text-md sm:text-md">Berita Terbaru</h3>
        </div>
        <div>
            {{--@php $count = ; @endphp--}}
            @foreach ($articles as $article)
            @if ($article->statusPost === 'Diposting')
            {{-- @if ($count < 2) --}} <div class="flex items-center ml-8">
                <div class="mr-4">
                    <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" alt="News 3 Image"
                        class="w-32 h-32 object-cover rounded-lg">
                </div>
                <div>
                    <a href="{{ route('post.show', $article) }}">
                        <h1 class="hover:text-red-500 text-2xl font-bold">{{ $article->judulPost }}
                        </h1>
                    </a>
                    <p class="mt-2"> {!! Str::limit(strip_tags($article->isiPost), 75) !!}</p>
                    <p class="text-gray-500 text-sm p-4"><i class='bx bx-calendar'></i>
                        {{ $article->created_at->format('d M Y') }}</p>
                </div>
        </div>
        <div class="divider "></div>
        {{-- @endif --}}
        {{-- @php $count++; @endphp --}}
        @endif
        @endforeach
        <div class="page mt-3">
            @if (!$articles->isEmpty())
            <div class="text-center">
                <div class="join">
                    @for ($i = 1; $i <= $articles->lastPage(); $i++)
                        <a class="join-item btn {{ $articles->currentPage() == $i ? 'btn-active' : '' }}"
                            href="{{ $articles->url($i) }}">{{ $i }}</a>
                        @endfor
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


{{-- isi dari bagian pengumuman --}}
<div class=" flex-1 w-1/3 mr-12 my-4 ml-1 p-5 md:w-">
    @php
    $gambarAktif = false;
    @endphp
    @foreach ($pengumuman as $pengumumanItem)
    @if ($pengumumanItem->aktif === 1)
    @php
    $gambarAktif = true;
    @endphp
    <div>
        @if ($pengumumanItem->image)
        <img src="{{ asset('images/' . $pengumumanItem->image) }}" alt="Pengumuman Image" class="w-auto h-96 scale-95">
        @endif
    </div>
    @endif
    @endforeach
    @if (!$gambarAktif)
    <h2
        class="text-center justify-center items-center px-3 py-2 text-xl md :text-sm font-semibold tracki uppercase text-gray-100 bg-amber-400">
        Tidak ada
        Pengumuman</h2>
    @endif
</div>

</div>


<livewire:berita-caousel />

{{--
<section id="berita-kategori" class="p-16">
    <div class="bg-white flex flex-wrap gap-4 ml-5 mr-5 my-2 p-4 rounded-lg shadow-md">
        @foreach ($kategori as $category)
        <div class="w-full mb-4">
            <h5 class="text-xl font-bold mb-1 bg-amber-400 text-white py-1 px-2 rounded-sm inline-block">{{
                $category->namaKategori }}</h5>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-5 mt-4">
                @php
                $articlesInCategory = $artikel->where('statusPost', 'Diposting')->where('kategori.id',
                $category->id)->take(5);
                @endphp
                @foreach ($articlesInCategory as $article)
                <div class="card bg-white shadow-xl w-full h-full">
                    <figure>
                        <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" alt="Gambar Berita"
                            class="w-full h-40 object-cover" />
                    </figure>
                    <div class="p-4">
                        <h2 class="text-black hover:text-red-500 text-sm">
                            <a href="{{ route('post.show', $article) }}">{{ $article->judulPost }}</a>
                        </h2>
                    </div>
                </div>
                @endforeach
            </div>
            @if ($articlesInCategory->isEmpty())
            <div class="p-2 mt-2">
                <p>Tidak ada berita pada kategori ini.</p>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</section> --}}




@endsection