<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTamu;
use App\Models\Pegawai;

class BukuTamuController extends Controller
{
    public function daftarBukuTamu()
    {
        $bukutamu = BukuTamu::all();
        $pegawai = Pegawai::all();
        return view('backend.pages/buku-tamu.bukutamu', ['bukutamu' => $bukutamu, 'pegawai' => $pegawai]);
    }
    public function tambahTamu(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'namaPengunjung' => 'required',
            'keperluan' => 'required',
        ], [
            'namaPengunjung.required' => 'Identitas harus diisi',
            'keperluan.required' => 'Nama Pegawai harus diisi',
        ]);

        // Mendapatkan id terakhir
        $lastTamu = BukuTamu::orderBy('id', 'desc')->first();
        $lastId = $lastTamu ? intval(substr($lastTamu->id, 2)) : 0;

        // Membuat id baru dengan format "P001"
        $id = 'BT' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        // Menggabungkan jabatan jika memilih anggota
        $keperluan = $request->keperluan;
        $pegawai = $request->pegawai;

        if ($keperluan === "Bertemu Dengan") {
            $keperluan = "Bertemu Dengan " . $pegawai;
        } else {
            $keperluan = $request->keperluan;
        }
        // Simpan data postingan ke database
        $bukutamu = new BukuTamu();
        $bukutamu->id = $id;
        $bukutamu->namaPengunjung = $request->namaPengunjung;
        $bukutamu->keperluan = $keperluan;
        $bukutamu->noTelp = $request->noTelp;
        $bukutamu->keterangan = $request->keterangan;
        $bukutamu->save();
        // Redirect atau berikan respon sesuai kebutuhan
        toast('Data Berhasil ditambahkan', 'success');
        return redirect('/buku-tamu');
    }


    public function tampilTamu()
    {
        $bukutamu = BukuTamu::all();
        $pegawai = Pegawai::all();
        return view('frontend.buku-tamu', ['bukutamu' => $bukutamu, 'pegawai' => $pegawai]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'namaPengunjung' => 'required',
            'keperluan' => 'required',
        ], [
            'namaPengunjung.required' => 'Identitas harus diisi',
            'keperluan.required' => 'Nama Pegawai harus diisi',
        ]);

        // Mendapatkan id terakhir
        $lastTamu = BukuTamu::orderBy('id', 'desc')->first();
        $lastId = $lastTamu ? intval(substr($lastTamu->id, 2)) : 0;

        // Membuat id baru dengan format "P001"
        $id = 'BT' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        // Menggabungkan jabatan jika memilih anggota
        $keperluan = $request->keperluan;
        $pegawai = $request->pegawai;

        if ($keperluan === "Bertemu Dengan") {
            $keperluan = "Bertemu Dengan " . $pegawai;
        } else {
            $keperluan = $request->keperluan;
        }
        // Simpan data postingan ke database
        $bukutamu = new BukuTamu();
        $bukutamu->id = $id;
        $bukutamu->namaPengunjung = $request->namaPengunjung;
        $bukutamu->keperluan = $keperluan;
        $bukutamu->noTelp = $request->noTelp;
        $bukutamu->keterangan = $request->keterangan;
        $bukutamu->save();
        // Redirect atau berikan respon sesuai kebutuhan
        toast('Data Berhasil ditambahkan', 'success');
        return redirect('/buktam');
    }
}
