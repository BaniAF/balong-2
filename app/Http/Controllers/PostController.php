<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Image_Kegiatan;

class PostController extends Controller
{
    // fungsi menampilkan semua postingan
    public function daftarPostingan($view)
    {
        $postingan = Post::with('kategori')->paginate(3);
        $kategoriList = Kategori::all(); // Mendapatkan data kategori
        $dataGaleri = Post::select('fotoPost', 'judulPost')->get();
        $galeriKegiatan = Image_Kegiatan::all();
        if ($view === 'post') {
            return view('backend.pages.postingan', ['postingan' => $postingan, 'kategoriList' => $kategoriList]);
        } elseif ($view === 'galeriPost') {
            return view('backend.pages.galeri', ['dataGaleri' => $dataGaleri, 'galeriKegiatan' => $galeriKegiatan]);
        }
    }
    public function editPostingan($id)
    {
        // Ambil data postingan berdasarkan ID
        $post = Post::with('kategori')->find($id);

        if (!$post) {
            // Jika data postingan tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
            abort(404, 'Postingan tidak ditemukan');
        }

        $kategoriList = Kategori::all(); // Mendapatkan data kategori
        return view('backend.pages.postingan.edit-postingan', compact('post', 'kategoriList'));
    }
    public function formTambah()
    {
        $postingan = Post::with('kategori')->get();
        $kategoriList = Kategori::all(); // Mendapatkan data kategori
        return view('backend/pages/postingan/tambah-postingan', ['postingan' => $postingan, 'kategoriList' => $kategoriList]);
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
            'relatedArticles' => $article->situsmirip(),
        ]);
    }

    public function searchNews(Request $request)
    {
        $searchTerm = $request->input('title');

        $results = Post::where('judulPost', 'like', '%' . $searchTerm . '%')->get();

        return view('frontend.articles.result', ['articles' => $results]);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileFoto = $request->file('upload'); // Corrected: Use 'upload' instead of 'fotoPost'
            $id = time();
            $namaFoto = $id . ' - ' . $fileFoto->getClientOriginalName();

            $fileFoto->move(public_path('uploads/Artikel/Postingan/'), $namaFoto);

            $url = asset('uploads/Artikel/Postingan/' . $namaFoto);

            // Return the image URL as part of the response
            return response()->json([
                'uploaded' => true,
                'url' => $url,
            ]);
        }

        // If no file was uploaded or there was an error, return an error response
        return response()->json([
            'uploaded' => false,
            'error' => ['message' => 'File upload failed.'],
        ]);
    }
    public function deleteImage($filename)
    {
        $filePath = public_path('uploads/Artikel/') . $filename;

        if (File::exists($filePath)) {
            File::delete($filePath);
            return response()->json(['message' => 'Image deleted successfully.']);
        }

        return response()->json(['error' => 'Image not found.'], 404);
    }
}
