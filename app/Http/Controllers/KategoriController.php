<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function daftarKategoriPost()
    {
        $kategori = Kategori::all();
        return view('backend.pages.kategoriPost', ['kategori' => $kategori]);
    }

    public function tambahKategori(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required|unique:kategoriPost',
        ], [
            'namaKategori.required' => 'Silahkan masukkan data dengan lengkap.',
        ]);

        // Mendapatkan id terakhir
        $lastKategori = Kategori::orderBy('id', 'desc')->first();
        $lastId = $lastKategori ? intval(substr($lastKategori->id, 1)) : 0;

        // Membuat id baru dengan format "K001"
        $id = 'K' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        $kategori = new Kategori();
        $kategori->id = $id;
        $kategori->namaKategori = $request->namaKategori;
        $kategori->save();

        toast('Kategori berhasil ditambahkan', 'success');
        return redirect('/kategoriPost');
    }

    public function editKategori(Request $request, $id)
    {
        $request->validate([
            'namaKategori' => 'required|unique:kategoriPost,namaKategori,' . $id,
        ]);

        $kategori = Kategori::find($id);

        if ($kategori) {
            $kategori->namaKategori = $request->namaKategori;
            $kategori->save();

            toast('Kategori berhasil diubah', 'success');
            return redirect('/kategoriPost');
        } else {
            toast('Data kategori tidak ditemukan', 'error');
            return redirect('/kategoriPost');
        }
    }

    public function hapusKategori($id)
    {
        $kategori = Kategori::find($id);

        if ($kategori) {
            $kategori->delete();

            toast('Kategori berhasil dihapus', 'success');
            return redirect('/kategoriPost');
        } else {
            toast('Data kategori tidak ditemukan', 'error');
            return redirect('/kategoriPost');
        }
    }
}
