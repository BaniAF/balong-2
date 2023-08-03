<?php

namespace App\Http\Controllers;

use App\Models\Proker;

use Illuminate\Http\Request;

class ProkerController extends Controller
{
    // untuk tampilan user

    public function show($id)
    {
        $proker = Proker::find($id);

        return view('proker.show', compact('proker'));
    }

    public function showDropdown()
    {
        $prokers = Proker::select('namaProker')->get();
        return view('layouts.navbar', ['prokers' => $prokers]);
    }

    // ------------------------------ //

    public function daftarProker()
    {
        $prokerja = Proker::all();
        return view('admin.pages.proker', ['prokerja' => $prokerja]);
    }
    // fungsi tambah post
    public function tambahProgram(Request $request)
    {
        $request->validate([
            'namaProker' => 'required',
            'descProker' => 'required',
        ]);

        // Mendapatkan id terakhir
        $lastProker = Proker::orderBy('id', 'desc')->first();
        $lastId = $lastProker ? intval(substr($lastProker->id, 2)) : 0;

        // Membuat id baru dengan format "PK001"
        $id = 'PK' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);

        // Simpan data program kegiatan ke database
        $proker = new Proker();
        $proker->id = $id;
        $proker->namaProker = $request->namaProker;
        $proker->descProker = $request->descProker;
        $proker->save();

        // Redirect atau berikan respon sesuai kebutuhan
        toast('Program Kegiatan berhasil ditambahkan', 'success');
        return redirect('proker');
    }

    public function hapusProgram($id)
    {
        // Cari postingan berdasarkan id
        $proker = Proker::where('id', $id)->first();

        if ($proker) {
            // Hapus data postingan dari database
            $proker->delete();
            toast('Program Kegiatan berhasil dihapus', 'success');
            return redirect('proker');
        } else {
            toast('Program Kegiatan tidak ditemukan', 'error');
            return redirect('proker');
        }
    }

    public function editProgram(Request $request, $id)
    {
        $request->validate([
            'namaProker' => 'required',
            'descProker' => 'required',
        ]);

        // Cari program kegiatan berdasarkan id
        $proker = Proker::find($id);

        if ($proker) {
            // Update data program kegiatan
            $proker->namaProker = $request->namaProker;
            $proker->descProker = $request->descProker;
            $proker->save();

            // Redirect atau berikan respon sesuai kebutuhan
            toast('Program Kegiatan berhasil diperbarui', 'success');
            return redirect('proker');
        } else {
            toast('Program Kegiatan tidak ditemukan', 'error');
            return redirect('proker');
        }
    }
}
