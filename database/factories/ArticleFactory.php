<?php

namespace Database\Factories;

use App\Models\Article;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Article::class;

    public function definition()
    {
        return [
            'judulArtikel' => $this->faker->sentence,
            'isiArtikel' => $this->faker->paragraph(7),
            'image' => 'dummy.jpg', // Ganti dengan nama file gambar dummy yang Anda sediakan
            'idKategori' => rand(1, 7), // Ganti angka 5 dengan jumlah kategori yang Anda buat
        ];
    }
}
