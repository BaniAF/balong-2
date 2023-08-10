<header class="p-2 bg-gray-800 text-gray-100 grid grid-rows-[auto,1fr] justify-center">

    {{-- bagian atas --}}
    <div class="flex justify-center items-center">
        <a rel="noopener noreferrer" href="#" aria-label="Back to homepage" class="flex items-center p-2 m-5">
            <img src="{{ asset('assets/img/logokab.png') }}" alt="Logo" class="w-10 h-auto ">
            <span class=" font-bold text-uppercase text-2xl ml-3">Kecamatan<br>
                <h2 class="text-3xl">BALONG</h2>
            </span>
        </a>
        <div class="relative">
            <form action="{{ route('search.news') }}" method="GET" id="searchForm">
                @csrf
                <input id="searchInput" name="title" type="text"
                    class="bg-gray-900 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-400"
                    placeholder="Search for..">
                <button type="submit" class="ml-2 px-4 py-2 bg-violet-400 text-white rounded-md">Cari</button>
                <ul id="searchResults"
                    class="dropdown hidden absolute mt-2 py-2 w-60 text-sm dark:bg-gray-800 bg-white rounded-sm shadow-lg">
                    <!-- Search results will be dynamically generated here -->
                </ul>
            </form>
        </div>
    </div>
    {{-- bagian bawah --}}
    <div class="container flex justify-between h-16 mx-auto">
        <ul class="items-stretch hidden space-x-3 lg:flex">
            <li class="flex">
                <a rel="noopener noreferrer" href="/"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Home</a>
            </li>
            <li class="flex relative">
                <a href="#" class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Profil</a>
                <ul
                    class="dropdown hidden absolute mt-2 py-2 w-44 text-sm dark:bg-gray-800 bg-white rounded-sm shadow-lg">
                    <li><a href="#"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Organisasi
                            dan Tata
                            Kerja</a></li>
                    <li><a href="#"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Tugas
                            dan Fungsi</a></li>
                    <li><a href="#"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Struktur
                            Organisasi</a></li>
                    <li><a href="#"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Visi,
                            Misi, Tujuan, Sasaran</a></li>
                    <li><a href="#"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Profil
                            Pejabat Struktural</a></li>
                    <li><a href="#"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Jumlah
                            Pegawai berdasarkan Pendidikan/ Pangkat/ Golongan/ Jenis Kelamin</a></li>
                    <!-- Tambahkan menu-dropdown lain di sini -->
                </ul>
            </li>

            <li class="flex">
                <a rel="noopener noreferrer" href="#"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Program Kerja</a>
                <ul
                    class="dropdown hidden absolute mt-2 py-2 w-44 text-sm dark:bg-gray-800 bg-white rounded-sm shadow-lg">
                    <li><a href="{{ route('proker.tampil.kode', ['kode' => 'PK01']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">RENJA</a>
                    </li>
                    <li><a href="{{ route('proker.tampil.kode', ['kode' => 'PK02']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">RENSTRA</a>
                    </li>
                    <li><a href="{{ route('proker.tampil.kode', ['kode' => 'PK03']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">IKU</a>
                    </li>
                    <li><a href="{{ route('proker.tampil.kode', ['kode' => 'PK04']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">DPA</a>
                    </li>
                    <li><a href="{{ route('proker.tampil.kode', ['kode' => 'PK05']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">PERJANJIAN
                            KINERJA</a></li>
                    <li><a href="{{ route('proker.tampil.kode', ['kode' => 'PK06']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">LAPORAN
                            KINERJA</a>
                    </li>
                    <li><a href="{{ route('proker.tampil.kode', ['kode' => 'PK07']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">RENCANA
                            KERJA</a>
                    </li>

                    <!-- Tambahkan menu-dropdown lain di sini -->
                </ul>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="#"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Bidang</a>
                <ul
                    class="dropdown hidden absolute mt-2 py-2 w-44 text-sm dark:bg-gray-800 bg-white rounded-sm shadow-lg">
                    <li><a href="{{ route('bidang.tampil', ['id' => '1']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Bidang</a>
                    </li>
                    <li><a href="{{ route('bidang.tampil', ['id' => '2']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Unit
                            Kerja</a></li>
                    <!-- Tambahkan menu-dropdown lain di sini -->
                </ul>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="#"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Regulasi</a>
                <ul
                    class="dropdown hidden absolute mt-2 py-2 w-44 text-sm dark:bg-gray-800 bg-white rounded-sm shadow-lg">
                    <li><a href="{{ route('regulasi.tampil', ['id' => '1']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Undang
                            - Undang</a></li>
                    <li><a href="{{ route('regulasi.tampil', ['id' => '2']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Peraturan
                            Pemerintah</a></li>
                    <li><a href="{{ route('regulasi.tampil', ['id' => '3']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Peraturan
                            Menteri</a></li>
                    <li><a href="{{ route('regulasi.tampil', ['id' => '4']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Peraturan
                            Bupati</a>
                    </li>
                    <li><a href="{{ route('regulasi.tampil', ['id' => '5']) }}"
                            class="block px-4 py-2 dark:text-white text-black hover:bg-indigo-500 hover:text-white">Peraturan
                            Daerah</a>
                    </li>
                    <!-- Tambahkan menu-dropdown lain di sini -->
                </ul>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="{{ route('layanan.tampil') }}"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Layanan Publik</a>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="{{ route('galeri.tampil') }}"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Galeri</a>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="#"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Buku Tamu</a>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="{{ route('contact.form') }}"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Kontak</a>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="{{ route('petasitus.maps') }}"
                    class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Peta Situs</a>
            </li>
        </ul>
    </div>
</header>


<style>
    /* Gaya untuk dropdown */
    .dropdown {
        display: none;
        /* Sembunyikan dropdown secara default */
        position: absolute;
        /* Add this to position the dropdown correctly */
        z-index: 1;
        /* Add this to make sure the dropdown appears above other content */
    }

    /* Tampilkan dropdown ketika elemen li di-hover */
    li:hover .dropdown {
        margin-top: 60px;
        display: block;
        display: inline;
    }
</style>


<!-- Include jQuery -->
<!-- resources/views/search.blade.php -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                const resultItem = $(
                                    '<li class="py-2 px-4 hover:bg-gray-200 cursor-pointer">' +
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
