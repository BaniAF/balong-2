<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use App\Models\Post;
use Livewire\Component;

class BeritaCaousel extends Component
{
    public $count = 5;

    public function render()
    {
        $kategori = Kategori::all();
        $artikel = Post::take($this->count)->get();
        $total_artikel = Post::count();

        return view('livewire.berita-caousel', [
            'kategori' => $kategori,
            'artikel' => $artikel,
            'total_artikel' => $total_artikel,
        ]);
    }

    public function loadmore()
    {
        $this->count += 5;
        sleep(2);
    }
}
