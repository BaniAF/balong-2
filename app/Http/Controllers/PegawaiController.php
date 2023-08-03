<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampilPegawai()
    {
        $pegawai = Pegawai::all();
        return view('admin.pages/buku-tamu.pegawai', ['pegawai' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambahPegawai(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawai',
            'namaPegawai' => 'required',
            'jabatan' => 'required',
        ], [
            'nip.unique' => 'NIP Pegawai telah terdaftar',
            'nip.required' => 'NIP Pegawai harus diisi',
            'namaPegawai.required' => 'Nama Pegawai harus diisi',
            'jabatan.required' => 'Jabatan Pegawai harus diisi',
            'fotoPegawai.image' => 'File harus berupa gambar',
            'fotoPegawai.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg',
            'fotoPegawai.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Mendapatkan id terakhir
        $lastPeg = Pegawai::orderBy('id', 'desc')->first();
        $lastId = $lastPeg ? intval(substr($lastPeg->id, 3)) : 0;

        // Membuat id baru dengan format "P001"
        $id = 'PEG' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);

        // Upload file foto
        $fileFoto = $request->file('fotoPegawai');
        $namaPegawai = $request->namaPegawai;
        $namaFoto = $namaPegawai . ' - ' . $id . '.' . $fileFoto->getClientOriginalExtension();
        $fileFoto->move(public_path('uploads/Pegawai/'), $namaFoto);

        // Menggabungkan jabatan jika memilih anggota
        $pangkat = $request->pangkat;
        $golongan = $request->golongan;
        $pangkat = $pangkat . ' ' . $golongan;
        // Simpan data postingan ke database
        $pegawai = new Pegawai();
        $pegawai->id = $id;
        $pegawai->nip = $request->nip;
        $pegawai->namaPegawai = $request->namaPegawai;
        $pegawai->jenisKelamin = $request->jenisKelamin;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->pangkat = $pangkat;
        $pegawai->fotoPegawai = $namaFoto;
        $pegawai->save();
        // Redirect atau berikan respon sesuai kebutuhan
        toast('Data Pegawai berhasil ditambahkan', 'success');
        return redirect('/pegawai');
    }

    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    public function hapusPegawai($id)
    {
        $pegawai = Pegawai::find($id);

        if ($pegawai) {
            $pegawai->delete();

            toast('Data Pegawai berhasil dihapus', 'success');
            return redirect('/pegawai');
        } else {
            toast('Data pegawai tidak ditemukan', 'error');
            return redirect('/pegawai');
        }
    }
}
