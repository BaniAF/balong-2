<ul class="dropdown hidden absolute mt-2 py-2 w-32 bg-gray-800 rounded-lg shadow-lg" id="proker-dropdown">
    @foreach ($prokers as $proker)
        <li>
            <a href="#"
                class="block px-4 py-2 text-white hover:bg-indigo-500 hover:text-white">{{ $proker->namaProker }}</a>
        </li>
    @endforeach
</ul>
