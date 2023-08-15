<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RegulasiController extends Controller
{
    public function daftarRegulasi()
    {
        $regulasi = Regulasi::paginate(10);
        return view('backend.pages.regulasi', ['regulasi' => $regulasi]);
    }
    public function tambahImage()
    {
        $regulasi = Regulasi::all();
        return view('backend/pages/galeri/tambah-galeri', ['regulasi' => $regulasi]);
    }

    // fungsi tambah post
    public function tambahRegulasi(Request $request)
    {
        $request->validate([
            'namaRegulasi' => 'required',
            'descRegulasi' => 'required',
            'fileRegulasi' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Mendapatkan id terakhir
        $lastRegulasi = Regulasi::orderBy('id', 'desc')->first();
        $lastRegulasi = $lastRegulasi->id + 1;
        // $lastId = $lastRegulasi ? intval(substr($lastRegulasi->id, 2)) : 0;

        // // Membuat id baru dengan format "PK001"
        // $id = 'PK' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);
        // Simpan data program kegiatan ke database
        $regulasi = new Regulasi();
        $regulasi->id = $lastRegulasi;
        $regulasi->namaRegulasi = $request->namaRegulasi;
        $regulasi->descRegulasi = $request->descRegulasi;
        // Simpan file jika ada file yang diunggah
        if ($request->hasFile('fileRegulasi') && $request->file('fileRegulasi')->isValid()) {
            $file = $request->file('fileRegulasi');
            $filename = $lastRegulasi . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
            $regulasi->fileRegulasi = $filename; // Simpan nama file ke kolom fileRegulasi dalam database
        } else {
            $regulasi->fileRegulasi = '-';
        }
        $regulasi->save();

        $submenu = new Submenu();
        $submenu->label = $request->namaRegulasi;
        $submenu->url = '/regulasi/{id}';
        $submenu->menu_id = 5;
        $submenu->status = 1;
        $submenu->save();

        // Redirect atau berikan respon sesuai kebutuhan
        toast('Regulasi berhasil ditambahkan', 'success');
        return redirect('regulasi');
    }

    public function hapusRegulasi($id)
    {
        // Cari postingan berdasarkan id
        $regulasi = Regulasi::where('id', $id)->first();

        if ($regulasi) {
            // Hapus data postingan dari database
            $regulasi->delete();
            toast('Regulasi berhasil dihapus', 'success');
            return redirect('regulasi');
        } else {
            toast('Regulasi tidak ditemukan', 'error');
            return redirect('regulasi');
        }
    }

    public function editRegulasi(Request $request, $id)
    {
        $request->validate([
            'namaRegulasi' => 'required',
            'descRegulasi' => 'required',
        ]);

        // Cari program kegiatan berdasarkan id
        $regulasi = Regulasi::find($id);

        if ($regulasi) {
            // Update data program kegiatan
            $regulasi->namaRegulasi = $request->namaRegulasi;
            $regulasi->descRegulasi = $request->descRegulasi;

            if ($request->hasFile('fileRegulasi')) {
                if ($regulasi->fileRegulasi) {
                    $oldFilePath = public_path('uploads/File/' . $regulasi->fileRegulasi);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Store the new fileRegulasi and update the fileRegulasi attribute in the database
                $file = $request->file('fileRegulasi');
                $filename = $id . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
                $regulasi->fileRegulasi = $filename;
            }

            $regulasi->save();

            $submenu = new Regulasi();
            $submenu->label = $request->namaRegulasi;
            $submenu->url = '/regulasi/{id}';
            $submenu->menu_id = 5;
            $submenu->status = 1;
            $submenu->save();

            // Redirect atau berikan respon sesuai kebutuhan
            toast('Regulasi berhasil diperbarui', 'success');
            return redirect('regulasi');
        } else {
            toast('Regulasi tidak ditemukan', 'error');
            return redirect('regulasi');
        }
    }

    public function tampilRegulasi($id)
    {
        $Regulasi = Regulasi::findOrFail($id);
        return view('frontend.articles.regulasi', compact('Regulasi'));
    }
}
