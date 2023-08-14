@extends('frontend.layouts.app')
@section('title')
    Pemerintah Kecamatan Balong
@endsection
@section('content')
    {{-- slider --}}
   
    {{-- endslider --}}
    <div class="flex">
        {{-- hero section --}}
        <div class="flex">
            <div class="hero bg-white ml-14 px-3 mx-1 mt-5 rounded shadow-xl">
                <div class="hero-content flex-col justify-items-center">
                    <div class="rounded-lg overflow-hidden" style="height: 400px; width: 800px;">
                        <img src="https://source.unsplash.com/random/1200x800/?2" alt="Image" class=" object-cover" />
                    </div>
                    <div class="align-baseline">
                        @foreach ($artikel->take(1) as $article)
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
            {{-- <div class="bg-white p-4 rounded-lg shadow-md"> --}}
                <div class="border-l-4 border-indigo-500 p-2 justify-start text-left h-10 mt-5">
                    <h3 class="text-2xl font-extrabold md:font-normal text-md sm:text-md">Berita Terbaru</h3>
                </div>
                @php $count = 0; @endphp
                @foreach ($artikel as $article)
                    @if ($article->statusPost === 'Diposting')
                        @if ($count < 5)
                            <div class="flex items-center ">
                                <div class="mr-4">
                                    <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" alt="News 3 Image"
                                        class="w-32 h-32 object-cover rounded-lg">
                                </div>
                                <div> 
                                    <a href="{{ route('post.show', $article) }}">
                                        <h1 class="text-purple-500 text-2xl font-bold">{{ $article->judulPost }}
                                        </h1>
                                    </a>
                                    <p> {!! Str::limit(strip_tags($article->isiPost), 75) !!}</p>
                                    <p class="text-gray-500 text-sm p-4"><i class='bx bx-calendar'></i>
                                        {{ $article->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="divider "></div>
                        @endif
                        @php $count++; @endphp
                    @endif
                @endforeach
            {{-- </div> --}}
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


    <section id="berita-kategori" class="p-4">

  
        <!-- berita bagian bawah -->
        <div class="bg-purple-500 flex flex-wrap gap-1 ml-9 mr-9 my-2  items-center justify-center p-4 rounded-lg">
            @foreach ($artikel as $article)
            @if ($article->statusPost === 'Diposting')
            <div class="flex">
                <h4 class="">
                    <span
                    class="bg-amber-400 text-white py-1 px-2 rounded-sm">{{ $article->kategori->namaKategori }}</span>
                </h4>
            </div>
                <div class="p-2 my-1">
                    <div class="card bg-gray-500 dark:bg-white shadow-xl w-48 h-72 items-center">
                        <figure>
                            <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" alt="Gambar Berita"
                                class="lazyload w-full" />
                        </figure>
                        <div class="card-body">
                            
                            <h2 class="card-title dark:text-black text-white hover:text-red-500 text-md">
                                <a href="{{ route('post.show', $article) }}">{{ $article->judulPost }}</a>
                            </h2>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>
            @endif
            @endforeach          
        </div>
    </section>
    
@endsection

<!-- Add the following script to your Blade template -->
<script>
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
</script>
