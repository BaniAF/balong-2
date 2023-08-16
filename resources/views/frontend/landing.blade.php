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
<style>
    
    swiper-container {
      width: 100%;
      height: 60%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 40%;
      height: 40%;
      object-fit: cover;
    }
  </style>
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
        <div class="flex flex-wrap gap-1  ml-9 my-4 mr-2 w-2/3 bg-white p-4 rounded-lg shadow-md">
            <div class="border-l-4 border-indigo-500 p-2 justify-start text-left h-10 mt-5 mb-4">
                <h3 class="text-2xl font-extrabold md:font-normal text-md sm:text-md">Berita Terbaru</h3>
            </div>
            <div>
                {{--@php $count = ; @endphp--}}
                @foreach ($articles as $article)
                    @if ($article->statusPost === 'Diposting')
                        {{-- @if ($count < 2) --}}
                            <div class="flex items-center ">
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
                                    <a class="join-item btn {{ $articles->currentPage() == $i ? 'btn-active' : '' }}" href="{{ $articles->url($i) }}">{{ $i }}</a>
                                @endfor
                            </div>
                        </div>
                    @endif
                </div>

                {{-- <div class="pagination mt-4">
                    {{ $article->links('frontend.layouts.paginasi') }}
                </div> --}}
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
                            <img src="{{ asset('images/' . $pengumumanItem->image) }}" alt="Pengumuman Image"
                                class="w-auto h-96 scale-95">
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
            <h2>ini bagian pengumuman</h2>
        </div>

    </div>


    <section id="berita-kategori" class="p-16">
        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30"
        slides-per-view="3">
        <swiper-slide>Slide 1</swiper-slide>
        <swiper-slide>Slide 2</swiper-slide>
        <swiper-slide>Slide 3</swiper-slide>
        <swiper-slide>Slide 4</swiper-slide>
        <swiper-slide>Slide 5</swiper-slide>
        <swiper-slide>Slide 6</swiper-slide>
        <swiper-slide>Slide 7</swiper-slide>
        <swiper-slide>Slide 8</swiper-slide>
        <swiper-slide>Slide 9</swiper-slide>
      </swiper-container>
        <div class="bg-white flex flex-wrap gap-1 ml-5 mr-5 my-2 items-center justify-center p-4 rounded-lg shadow-md">
            @foreach ($kategori as $category)
                <div class="swiper-container" style="width:1000px">
                    <div class="swiper-wrapper">
                        <div class="grid grid-cols-5 gap-2 justify-center items-center swiper-slide">
                            <div class="col-span-5">
                                <h5 class="text-xl font-bold mb-1 ml-10 mt-2 bg-amber-400 text-white py-1 px-2 rounded-sm" style="display: inline-block;">{{ $category->namaKategori }}</h5>
                            </div>
                            @php $foundArticle = false; $articleCount = 0; @endphp
                            @foreach ($artikel as $article)
                                @if ($article->statusPost === 'Diposting' && $article->kategori->id === $category->id && $articleCount < 5)
                                    <div class="swiper-slide p-2 my-7">
                                        <div class="card bg-white shadow-xl w-40 h-60">
                                            <figure>
                                                <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" alt="Gambar Berita" class="w-full" />
                                            </figure>
                                            <div class="card-body">
                                                <h2 class="card-title text-black hover:text-red-500 text-sm">
                                                    <a href="{{ route('post.show', $article) }}">{{ $article->judulPost }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                    </div>
                                    @php $foundArticle = true; $articleCount++; @endphp
                                @endif
                            @endforeach
                            @if (!$foundArticle)
                                <div class="p-2 my-1 ml-10">
                                    <p>Tidak ada berita pada kategori ini.</p>
                                </div>
                            @endif
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection

<!-- Add the following script to your Blade template -->
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        let offset = 5; // Start with the initial count of 5 articles
        const loadMoreBtn = document.querySelector('.load-more-btn');
        const articlesContainer = document.querySelector('.articles-container .bg-white');

        loadMoreBtn.addEventListener('click', function() {
            fetch(`/load-more?offset=${offset}`)
                .then(response => response.json())
                .then(articles => {
                    if (articles.length > 0) {
                        offset += articles.length;

                        articles.forEach(article => {
                            const articleDiv = document.createElement('div');
                            articleDiv.classList.add('flex', 'items-center');
                            articleDiv.innerHTML = `
                                <!-- Your article content here -->
                            `;
                            articlesContainer.appendChild(articleDiv);

                            const dividerDiv = document.createElement('div');
                            dividerDiv.classList.add('divider');
                            articlesContainer.appendChild(dividerDiv);
                        });
                    } else {
                        loadMoreBtn.disabled = true;
                        loadMoreBtn.innerText = 'No more articles';
                    }
                })
                .catch(error => console.error(error));
        });
    });
</script> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function loadMore(categoryId, offset) {
        $.get('/load-more', { categoryId: categoryId, offset: offset }, function(data) {
            var container = $("#loadMoreButton-" + categoryId).parent().prev();
            container.append(data);
            $("#loadMoreButton-" + categoryId).remove();
        });
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var mySwiper = new Swiper(".swiper-container", {
            slidesPerView: 1,
            spaceBetween: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
