<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class layananController extends Controller
{
    public function daftarLayanan()
    {
        $layanan = Layanan::all();
        return view('admin.pages.layanan', ['layanan' => $layanan]);
    }
    // fungsi tambah post
    public function tambahLayanan(Request $request)
    {
        $request->validate([
            'namaLayanan' => 'required',
            'descLayanan' => 'required',
            'lokasi' => 'required',
            'kontak' => 'required',
            'jam_operasional_buka' => 'required',
            'jam_operasional_tutup' => 'required',
            'kategoriLayanan' => 'required',
            'persyaratan' => 'required',
            'biaya' => 'required',
            'keterangan' => 'required',
        ]);

        // Gabungkan nilai jam_operasional_buka dan jam_operasional_tutup
        $jamBuka = $request->input('jam_operasional_buka');
        $jamTutup = $request->input('jam_operasional_tutup');
        $jamOperasional = $jamBuka . '-' . $jamTutup;

        // Mendapatkan id terakhir
        $lastPost = Layanan::orderBy('id', 'desc')->first();
        $lastId = $lastPost ? intval(substr($lastPost->id, 1)) : 0;

        // Membuat id baru dengan format "L001"
        $id = 'L' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        // Simpan data Layanan ke database
        $layanan = new Layanan();
        $layanan->id = $id;
        $layanan->namaLayanan = $request->namaLayanan;
        $layanan->descLayanan = $request->descLayanan;
        $layanan->lokasi = $request->lokasi;
        $layanan->kontak = $request->kontak;
        $layanan->jam_operasional = $jamOperasional;
        $layanan->kategoriLayanan = $request->kategoriLayanan;
        $layanan->persyaratan = $request->persyaratan;
        $layanan->biaya = $request->biaya;
        $layanan->keterangan = $request->keterangan;
        $layanan->save();
        // Redirect atau berikan respon sesuai kebutuhan
        toast('Layanan berhasil ditambahkan', 'success');
        return redirect('/layanan-publik');
    }

    public function hapusLayanan($id)
    {
        // Cari postingan berdasarkan id
        $layanan = Layanan::where('id', $id)->first();

        if ($layanan) {
            // Hapus data postingan dari database
            $layanan->delete();

            toast('Layanan Publik berhasil dihapus', 'success');
            return redirect('/layanan-publik');
            // return redirect('/post')->with('success', 'Postingan berhasil dihapus!');
        } else {
            toast('Postingan tidak ditemukan', 'error');
            return redirect('/layanan-publik');
            // return redirect('/post')->with('error', 'Postingan tidak ditemukan!');
        }
    }

    // Fungsi untuk mengedit data layanan
    public function editLayanan(Request $request, $id)
    {
        $request->validate([
            'namaLayanan' => 'required',
            'descLayanan' => 'required',
            'lokasi' => 'required',
            'kontak' => 'required',
            'jam_operasional_buka' => 'required',
            'jam_operasional_tutup' => 'required',
            'kategoriLayanan' => 'required',
            'persyaratan' => 'required',
            'biaya' => 'required',
            'keterangan' => 'required',
        ]);

        // Gabungkan nilai jam_operasional_buka dan jam_operasional_tutup
        $jamBuka = $request->input('jam_operasional_buka');
        $jamTutup = $request->input('jam_operasional_tutup');
        $jamOperasional = $jamBuka . '-' . $jamTutup;

        // Temukan data layanan berdasarkan ID
        $layanan = Layanan::find($id);

        if ($layanan) {
            // Update data layanan
            $layanan->namaLayanan = $request->namaLayanan;
            $layanan->descLayanan = $request->descLayanan;
            $layanan->lokasi = $request->lokasi;
            $layanan->kontak = $request->kontak;
            $layanan->jam_operasional = $jamOperasional;
            $layanan->kategoriLayanan = $request->kategoriLayanan;
            $layanan->persyaratan = $request->persyaratan;
            $layanan->biaya = $request->biaya;
            $layanan->keterangan = $request->keterangan;
            $layanan->save();

            // Redirect atau berikan respon sesuai kebutuhan
            toast('Data layanan berhasil diupdate', 'success');
            // dd('Data layanan berhasil diupdate');
            return redirect('/layanan-publik');
        } else {
            toast('Data layanan tidak ditemukan', 'error');
            return redirect('/layanan-publik');
        }
    }
}
