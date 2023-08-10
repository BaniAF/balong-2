<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function lihat()
    {
        $announcement = Pengumuman::all();

        return view('backend.pages.pengumuman.list', compact('announcement'));
    }

    public function tambahGambar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan ekstensi dan ukuran file yang diizinkan
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();

            // Pindahkan file ke folder public/image
            $image->move(public_path('images'), $imageName);

            // Simpan nama file ke dalam tabel pengumuman_image
            Pengumuman::create(['image' => $imageName]);

            // Tampilkan pesan sukses dan redirect ke halaman lain jika diperlukan
            toast('Gambar berhasil diupload', 'success');
            return redirect('list');
        } else {
            toast('Gambar tidak ditemukan', 'error');
            return redirect('list');
        }
    }



    public function hapusGambar($id)
    {
        // Cari postingan berdasarkan id
        $proker = Pengumuman::where('id', $id)->first();

        if ($proker) {
            // Hapus data postingan dari database
            $proker->delete();
            toast('Gambar berhasil dihapus', 'success');
            return redirect('list');
        } else {
            toast('Gambar tidak ditemukan', 'error');
            return redirect('list');
        }
    }

    public function aktifkanGambar($id)
    {
        $pengumumanImage = Pengumuman::find($id);

        if ($pengumumanImage) {
            // Ubah status aktif dari gambar
            $pengumumanImage->aktif = !$pengumumanImage->aktif;
            $pengumumanImage->save();

            toast('Status gambar berhasil diubah', 'success');
        } else {
            toast('Gambar tidak ditemukan', 'error');
        }

        return redirect('list');
    }
}
