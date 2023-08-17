{{-- <div class="bg-white flex flex-wrap gap-4 ml-5 mr-5 my-2 p-4 rounded-lg shadow-md">
    @foreach ($kategori as $category)
    <div class="w-full mb-4">
        <h5 class="text-xl font-bold mb-1 bg-amber-400 text-white py-1 px-2 rounded-sm inline-block">{{
            $category->namaKategori }}</h5>
        <div class="carousel">
            @php
            $articlesInCategory = $artikel->where('statusPost', 'Diposting')->where('kategori.id', $category->id);
            @endphp
            <div class="carousel-container">
                @foreach ($articlesInCategory as $article)
                <div class="carousel-item">
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
                </div>
                @endforeach
            </div>
        </div>
        @if ($articlesInCategory->isEmpty())
        <div class="p-2 mt-2">
            <p>Tidak ada berita pada kategori ini.</p>
        </div>
        @endif
    </div>
    @endforeach
</div> --}}

{{-- @foreach ($kategori as $category)
<div class="w-full mb-4">
    <h5 class="text-xl font-bold mb-1 bg-amber-400 text-white py-1 px-2 rounded-sm inline-block">{{
        $category->namaKategori }}</h5>
    <div class="carousel w-full">
        @php
        $articlesInCategory = $artikel->where('statusPost', 'Diposting')->where('kategori.id', $category->id);
        @endphp
        <div id="slide{{$category->id}}" class="carousel-item relative w-full">
            @foreach ($articlesInCategory as $article)
            <div class="slide-content">
                <img src="{{ asset('uploads/Artikel/' . $article->fotoPost) }}" class="w-full" />
                <h2 class="text-black hover:text-red-500 text-sm">
                    <a href="{{ route('post.show', $article) }}">{{ $article->judulPost }}</a>
                </h2>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach --}}

<div class="container py-7">
    @foreach ($kategori as $item)
    <div class="mb-7 ml-24 mr-24">
        <h5 class="text-xl font-bold mb-1 bg-red-500 text-white py-1 px-2 rounded-sm inline-block">
            {{$item->namaKategori}}</h5>
        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-5">
            @php
            $artikelkategori = $artikel->where('statusPost', 'Diposting')->where('kategori.id', $item->id);
            @endphp
            @foreach ($artikelkategori as $model)
            <div class="card bg-white shadow-md">
                <figure>
                    <img src="{{ asset('uploads/artikel/' . $model->fotoPost) }}" alt="images"
                        class="w-full h-48 object-cover" />
                </figure>
                <div class="p-4">
                    <h2 class="text-lg font-semibold">{{$model->judulPost}}</h2>
                    <div class="mt-2">
                        <a href="{{ route('post.show', $model) }}" class="text-gray-400 hover:text-red-600">Baca
                            Sekarang!</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if ($count < $total_artikel) <div class="mt-4">
            <button
                class="bg-gradient-to-r from-indigo-500 via-sky-500 to-emerald-500 hover:from-pink-500 hover:to-yellow-500 text-white py-2 px-4 rounded-full"
                wire:click="loadmore">Muat Lebih</button>
            @endif
    </div>
</div>
@endforeach
</div>