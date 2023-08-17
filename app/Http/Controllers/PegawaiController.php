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
        $pegawai = Pegawai::paginate(10);
        return view('backend.pages/buku-tamu.pegawai', ['pegawai' => $pegawai]);
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
            'fotoPegawai' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
        $pegawai->pendTerakhir = $request->pendidikan;

        if ($request->hasFile('fotoPegawai')) {
            // Upload file foto baru
            $fileFoto = $request->file('fotoPegawai');
            $namaPegawai = $request->namaPegawai;
            $namaFoto = $id . ' - ' . $namaPegawai . '.' . $fileFoto->getClientOriginalExtension();
            $fileFoto->move(public_path('uploads/Pegawai/'), $namaFoto);

            // Set fotoPegawai dengan nama foto baru
            $pegawai->fotoPegawai = $namaFoto;
        } else {
            // Jika tidak ada foto yang diunggah, set fotoPegawai dengan "-"
            $pegawai->fotoPegawai = '-';
        }
        $pegawai->save();
        // Redirect atau berikan respon sesuai kebutuhan
        toast('Data Pegawai berhasil ditambahkan', 'success');
        return redirect('/pegawai');
    }

    public function show(Pegawai $pegawai)
    {
        //
    }

    public function updatePegawai(Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'namaPegawai' => 'required',
            'jabatan' => 'required',
            'fotoPegawai' => 'image|mimes:jpeg,png,jpg|max:2048', 
        ], [
            'namaPegawai.required' => 'Nama Pegawai harus diisi',
            'jabatan.required' => 'Jabatan Pegawai harus diisi',
            'fotoPegawai.image' => 'File harus berupa gambar',
            'fotoPegawai.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg',
            'fotoPegawai.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Temukan data postingan berdasarkan ID
        $pegawai = Pegawai::find($id);

        if ($pegawai) {
            // Periksa apakah ada file foto baru yang diunggah
            if ($request->hasFile('fotoPegawai')) {
                // Upload file foto baru
                $fileFoto = $request->file('fotoPegawai');
                $namaPegawai = $request->namaPegawai;
                $namaFoto = $id . ' - ' . $namaPegawai . '.' . $fileFoto->getClientOriginalExtension();
                $fileFoto->move(public_path('uploads/Pegawai/'), $namaFoto);

                // Hapus foto lama (jika ada)
                if ($pegawai->fotoPost) {
                    $path = public_path('uploads/Pegawai/' . $pegawai->fotoPegawai);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                // Update data postingan dengan foto baru
                $pegawai->fotoPegawai = $namaFoto;
            }

            $pangkat = $request->pangkat;
            $golongan = $request->golongan;
            $pangkat = $pangkat . ' ' . $golongan;
            // Update data pegawai
            $pegawai->namaPegawai = $request->namaPegawai;
            $pegawai->jabatan = $request->jabatan;
            $pegawai->pangkat = $pangkat;
            $pegawai->pendTerakhir = $request->pendidikan;
            $pegawai->save();

            // Redirect atau berikan respon sesuai kebutuhan
            toast('Data Pegawai berhasil diubah', 'success');
            return redirect('/pegawai');
        } else {
            toast('Data Pegawai tidak ditemukan', 'error');
            return redirect('/pegawai');
        }
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
