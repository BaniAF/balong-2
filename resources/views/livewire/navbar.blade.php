
<header class="p-2 bg-gray-50 text-gray-100 grid grid-rows-[auto,1fr] justify-center">

    {{-- bagian atas --}}
    <div class="flex justify-center items-center">
        
        <a rel="noopener noreferrer" href="#" aria-label="Back to homepage" class="flex items-center p-2 m-5">
            <img src="{{ asset('assets/img/logokab.png') }}" alt="Logo" class="w-10 h-auto ">
            <span class=" font-bold text-gray-800 text-uppercase text-2xl ml-3 ">Kecamatan<br>
                <h2 class="text-3xl text-gray-800 -mt-2 ">BALONG</h2>
            </span>
        </a>

        <div class="relative mt-4">
            <form action="{{ route('search.news') }}" method="GET" id="searchForm">
                @csrf
                <div class="join">
                    <div>
                        <div>
                            <input class="input join-item bg-gray-200 text-gray-600 px-4 py-2 rounded-md focus:outline-none" 
                            id="searchInput" name="title" type="text" placeholder="Search"/>
                        </div>
                    </div>
                    <div class="indicator">
                        <button type="submit" class="btn join-item px-4 py-2 bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white rounded-md">Search</button>
                    </div>
                </div>
                <ul id="searchResults"
            class="dropdown hidden absolute mt-2 py-2 w-60 text-sm dark:text-white text-black dark:bg-gray-800 bg-white rounded-sm shadow-lg z-10">                    <!-- Search results will be dynamically generated here -->
                </ul>
            </form>
        </div>
    </div>
    {{-- bagian bawah --}}
    {{-- <div class="container flex justify-between h-16 mx-auto">
        <ul class="items-stretch hidden space-x-3 lg:flex">
            <div class="relative">
                @php
                $menuAktif = false;
            @endphp
            @foreach ($menus as $menuItems)
                @if ($menuItems->status === 1)
                    @php
                        $menuAktif = true;
                    @endphp
                    <div class="group inline-block relative">
                        <ul class="text-gray-800 font-bold text-md px-4 py-2">
                           <a href="{{ $menuItems['url'] }}">{{ $menuItems['label'] }}</a> 
                        </ul>
                        @if (count($menuItems['submenus']))
                            <div class="absolute hidden group-hover:block mt-1 justify-center bg-white rounded w-52 shadow-lg z-10">
           
                                @foreach ($menuItems['submenus'] as $submenu)
                                    @php
                                        // Menggunakan relasi untuk mendapatkan data Proker yang sesuai
                                        $proker = $submenu->proker;
                                        $profil = $submenu->profil;
                                        $bidang = $submenu->bidang;
                                        $regulasi = $submenu->regulasi;
                                    @endphp
                                    @if ($proker)
                                        <a href="{{ route('proker.tampil', ['id' => $proker->id]) }}" class="block px-4 py-2 text-gray-800 text-sm hover:bg-gray-100">{{ $proker->namaProker }}</a>
                                   @elseif ($profil)
                                   <a href="{{ route('profil.tampil', ['id' => $profil->id]) }}" class="block px-4 py-2 text-gray-800 text-sm hover:bg-gray-100">{{ $profil->namaProfil }}</a>
                                   @elseif ($bidang)
                                   <a href="{{ route('bidang.tampil', ['id' => $bidang->id]) }}" class="block px-4 py-2 text-gray-800 text-sm hover:bg-gray-100">{{ $bidang->namaBidang }}</a>
                                   @elseif ($regulasi)
                                   <a href="{{ route('regulasi.tampil', ['id' => $regulasi->id]) }}" class="block px-4 py-2 text-gray-800 text-sm hover:bg-gray-100">{{ $regulasi->namaRegulasi }}</a>
                                        @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
            @if (!$menuAktif)
                <h2
                    class="text-center justify-center items-center px-3 py-2 text-xl md :text-sm font-semibold tracki uppercase text-gray-100 bg-amber-400">
                    Tidak ada
                    Menu</h2>
            @endif
            </div>
        </ul>
    </div> --}}

    <div class="">
      
        <div class="group inline-block relative" x-data="{isshow:false}">
            <ul class="text-gray-800 font-bold text-md px-4 py-2 " @mouseenter="isshow=true">
               <a href="#">Ini Menu</a> 
            </ul>

            <div x-show="isshow" @mouseleave="isshow=false" x-transition class="absolute group-hover:block mt-1 justify-center bg-white rounded w-52 shadow-lg z-10">
                <a href="#">Ini Menu</a> 
            </div>
        </div>
    </div>
</header>


<!-- Include jQuery -->
<!-- resources/views/search.blade.php -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        const searchForm = $('#searchForm');
        const searchInput = $('#searchInput');
        const searchResults = $('#searchResults');

        searchInput.on('input', function() {
            const searchTerm = $(this).val().trim();
            if (searchTerm.length > 0) {
                $.ajax({
                    type: 'GET',
                    url: searchForm.attr('action'),
                    data: searchForm.serialize(),
                    dataType: 'json',
                    success: function(data) {
                        searchResults.empty();

                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                const resultItem = $(
                                    '<li class="py-2 px-4 bg-gradient-to-r hover:from-green-400 hover:to-blue-500 hover:text-white cursor-pointer">' +
                                    item.judulPost + '</li>');
                                resultItem.click(function() {
                                    searchInput.val(item.judulPost);
                                    searchResults.addClass('hidden')
                                        .empty();
                                });
                                searchResults.append(resultItem);
                            });
                            searchResults.removeClass('hidden');
                        } else {
                            searchResults.addClass('hidden').empty();
                        }
                    }
                });
            } else {
                searchResults.addClass('hidden').empty();
            }
        });

        $(document).on('click', function(event) {
            if (!$(event.target).closest(searchResults).length && !$(event.target).closest(searchInput)
                .length) {
                searchResults.addClass('hidden').empty();
            }
        });
    });
</script> --}}

<script>
    $(document).ready(function() {
        const searchForm = $('#searchForm');
        const searchInput = $('#searchInput');
        const searchResults = $('#searchResults');

        searchInput.on('input', function() {
            const searchTerm = $(this).val().trim();
            if (searchTerm.length > 0) {
                $.ajax({
                    type: 'GET',
                    url: searchForm.attr('action'),
                    data: searchForm.serialize(),
                    dataType: 'json',
                    success: function(data) {
                        searchResults.empty();

                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                const resultItem = $('<li class="py-2 px-4 bg-gradient-to-r hover:from-green-400 hover:to-blue-500 hover:text-white cursor-pointer">' + item.judulPost + '</li>');
                                resultItem.click(function() {
                                    searchInput.val(item.judulPost);
                                    searchResults.addClass('hidden').empty();
                                });
                                searchResults.append(resultItem);
                            });
                            searchResults.removeClass('hidden');
                        } else {
                            searchResults.addClass('hidden').empty();
                        }
                    }
                });
            } else {
                searchResults.addClass('hidden').empty();
            }
        });

        $(document).on('click', function(event) {
            if (!$(event.target).closest(searchResults).length && !$(event.target).closest(searchInput).length) {
                searchResults.addClass('hidden').empty();
            }
        });
    });
</script>

<script>
    $('a[data-id]').click(function(e) {
        e.preventDefault();
        var programId = $(this).data('id');

        // Kirim permintaan AJAX ke ProkerController
        $.ajax({
            url: '/proker/' + programId, // Ganti dengan rute yang sesuai
            type: 'GET',
            success: function(response) {
                // Manipulasi atau tampilkan data dari respons
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>


