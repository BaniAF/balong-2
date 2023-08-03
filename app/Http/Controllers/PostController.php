<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;

class PostController extends Controller
{
    // fungsi menampilkan semua postingan
    public function daftarPostingan($view)
    {
        $postingan = Post::with('kategori')->get();
        $kategoriList = Kategori::all(); // Mendapatkan data kategori
        $dataGaleri = Post::select('fotoPost', 'judulPost')->get();
        if ($view === 'post') {
            return view('admin.pages.postingan', ['postingan' => $postingan, 'kategoriList' => $kategoriList]);
        } elseif ($view === 'galeriPost') {
            return view('admin.pages.galeri', ['dataGaleri' => $dataGaleri]);
        }
    }
    // fungsi tambah post
    public function tambahPostingan(Request $request)
    {
        $request->validate([
            'judulPost' => 'required',
            'isiPost' => 'required',
            'kategoriPost' => 'required',
            'statusPost' => 'required',
        ], [
            'judulPost.required' => 'Judul postingan harus diisi',
            'isiPost.required' => 'Isi postingan harus diisi',
            'kategoriPost.required' => 'Kategori postingan harus dipilih',
            'fotoPost.image' => 'File harus berupa gambar',
            'fotoPost.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg',
            'fotoPost.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Mendapatkan id terakhir
        $lastPost = Post::orderBy('id', 'desc')->first();
        $lastId = $lastPost ? intval(substr($lastPost->id, 1)) : 0;

        // Membuat id baru dengan format "P001"
        $id = 'P' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        // Upload file foto
        $fileFoto = $request->file('fotoPost');
        $namaFoto = $id . ' - ' . $fileFoto->getClientOriginalName();
        $fileFoto->move(public_path('uploads/Artikel/'), $namaFoto);

        // Tentukan nilai statusPost berdasarkan tombol yang ditekan
        $submitType = $request->input('submitType');
        if ($submitType === 'simpan') {
            $statusPost = 'Belum Diposting';
        } elseif ($submitType === 'posting') {
            $statusPost = 'Diposting';
        }
        // Simpan data postingan ke database
        $post = new Post();
        $post->id = $id;
        $post->judulPost = $request->judulPost;
        $post->isiPost = $request->isiPost;
        $post->kategoriPost = $request->kategoriPost;
        $post->userPost = $request->userPost;
        $post->fotoPost = $namaFoto;
        $post->statusPost = $statusPost; // Simpan nilai statusPost yang telah ditentukan
        $post->save();
        // Redirect atau berikan respon sesuai kebutuhan
        toast('Postingan berhasil ditambahkan', 'success');
        return redirect('/post');
        // return redirect('/post')->with('success', 'Postingan berhasil ditambahkan!');
    }
    public function hapusPostingan($id)
    {
        // Cari postingan berdasarkan id
        $post = Post::where('id', $id)->first();

        if ($post) {
            // Hapus file foto dari direktori uploads
            $fileFotoPath = public_path('uploads/') . $post->fotoPost;
            if (file_exists($fileFotoPath)) {
                unlink($fileFotoPath);
            }

            // Hapus data postingan dari database
            $post->delete();

            toast('Postingan berhasil dihapus', 'success');
            return redirect('/post');
            // return redirect('/post')->with('success', 'Postingan berhasil dihapus!');
        } else {
            toast('Postingan tidak ditemukan', 'error');
            return redirect('/post');
            // return redirect('/post')->with('error', 'Postingan tidak ditemukan!');
        }
    }
    public function updateStatusPostingan($id, Request $request)
    {
        // dd($id);
        $post = Post::find($id);

        if ($post) {

            $post->statusPost = 'Diposting';
            $post->save();

            toast('Status postingan berhasil diperbarui', 'success');
            return redirect('/post');
        } else {
            toast('Postingan tidak ditemukan', 'error');
            return redirect('/post');
        }
    }

    // Fungsi untuk mengedit data Psotingan
    public function updatePostingan(Request $request, $id)
    {
        $request->validate([
            'judulPost' => 'required',
            'isiPost' => 'required',
            'kategoriPost' => 'required',
            'fotoPost' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'statusPost' => 'required',
        ]);

        // Temukan data postingan berdasarkan ID
        $post = Post::find($id);

        if ($post) {
            // Periksa apakah ada file foto baru yang diunggah
            if ($request->hasFile('fotoPost')) {
                // Upload file foto baru
                $fileFoto = $request->file('fotoPost');
                $namaFoto = $id . ' - ' . $fileFoto->getClientOriginalName();
                $fileFoto->move(public_path('uploads/'), $namaFoto);

                // Hapus foto lama (jika ada)
                if ($post->fotoPost) {
                    $path = public_path('uploads/' . $post->fotoPost);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }

                // Update data postingan dengan foto baru
                $post->fotoPost = $namaFoto;
            }

            // Update data postingan
            $post->judulPost = $request->judulPost;
            $post->isiPost = $request->isiPost;
            $post->kategoriPost = $request->kategoriPost;
            $post->userPost = $request->userPost;
            $post->statusPost = $request->statusPost; // Simpan nilai statusPost yang telah ditentukan
            $post->save();

            // Redirect atau berikan respon sesuai kebutuhan
            toast('Postingan berhasil diubah', 'success');
            return redirect('/post');
        } else {
            toast('Data Postingan tidak ditemukan', 'error');
            return redirect('/post');
        }
    }

    public function lihat(Post $article)
    {
        // Pass the $article data to the frontend.show.blade.php view
        return view('frontend.articles.show', [
            'article' => $article,
            'relatedArticles' => $article->related(),
        ]);
    }
}
