<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Post::where('statusPost', 'Diposting')->paginate(5);
        return view('frontend.landing', compact('articles'));

        $grupPost = $articles->groupBy(function ($article) {
            return $article->kategori->namaKategori;
        });

        // Ambil semua kategori untuk digunakan dalam tampilan
        $kategori = Kategori::all();

        return view('frontend.landing', compact('grupPost', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
            'relatedArticles' => $article->related(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
