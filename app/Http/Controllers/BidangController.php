<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Submenu;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function daftarBidang()
    {
        $bidang = Bidang::paginate(10);
        return view('backend.pages.bidang', ['bidang' => $bidang]);
    }
    public function tambahImage()
    {
        $bidang = Bidang::all();
        return view('backend/pages/galeri/tambah-galeri', ['bidang' => $bidang]);
    }

    // fungsi tambah post
    public function tambahBidang(Request $request)
    {
        $request->validate([
            'namaBidang' => 'required',
            'descBidang' => 'required',
            'fileBidang' => 'nullable|mimes:pdf, doc, docx, ppt, pptx |max:2048',
        ]);

        // Mendapatkan id terakhir
        $lastBidang = Bidang::orderBy('id', 'desc')->first();
        $lastBidang = $lastBidang->id + 1;
        // $lastId = $lastBidang ? intval(substr($lastBidang->id, 2)) : 0;

        // // Membuat id baru dengan format "PK001"
        // $id = 'PK' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);
        // Simpan data program kegiatan ke database
        $bidang = new Bidang();
        $bidang->id = $lastBidang;
        $bidang->namaBidang = $request->namaBidang;
        $bidang->descBidang = $request->descBidang;
        // Simpan file jika ada file yang diunggah
        if ($request->hasFile('fileBidang') && $request->file('fileBidang')->isValid()) {
            $file = $request->file('fileBidang');
            $filename = $lastBidang . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
            $bidang->fileBidang = $filename; // Simpan nama file ke kolom fileBidang dalam database
        } else {
            $bidang->fileBidang = '-';
        }
        $bidang->save();

        // Save Ke SUb Menu
        $submenu = new Submenu();
        $submenu->label = $request->namaBidang;
        $submenu->url = 'bidang/{id}';
        $submenu->menu_id = 4;
        $submenu->status = 1;
        $submenu->save();

        // Redirect atau berikan respon sesuai kebutuhan
        toast('Bidang berhasil ditambahkan', 'success');
        return redirect('bidang');
    }

    public function hapusBidang($id)
    {
        // Cari postingan berdasarkan id
        $bidang = Bidang::where('id', $id)->first();

        if ($bidang) {
            Submenu::where('label', $bidang->namaBidang)->delete();
            // Hapus data postingan dari database
            $bidang->delete();
            toast('Bidang berhasil dihapus', 'success');
            return redirect('bidang');
        } else {
            toast('Bidang tidak ditemukan', 'error');
            return redirect('bidang');
        }
    }

    public function editBidang(Request $request, $id)
    {
        $request->validate([
            'namaBidang' => 'required',
            'descBidang' => 'required',
        ]);

        // Cari program kegiatan berdasarkan id
        $bidang = Bidang::find($id);

        if ($bidang) {
            // Update data program kegiatan
            $bidang->namaBidang = $request->namaBidang;
            $bidang->descBidang = $request->descBidang;

            if ($request->hasFile('fileBidang')) {
                if ($bidang->fileBidang) {
                    $oldFilePath = public_path('uploads/File/' . $bidang->fileBidang);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Store the new fileBidang and update the fileBidang attribute in the database
                $file = $request->file('fileBidang');
                $filename = $id . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
                $bidang->fileBidang = $filename;
            }

            $bidang->save();


            $submenu = new Submenu();
            $submenu->label = $request->namaBidang;
            $submenu->url = 'bidang/{id}';
            $submenu->menu_id = 4;
            $submenu->status = 1;
            $submenu->save();

            // Redirect atau berikan respon sesuai kebutuhan
            toast('Bidang berhasil diperbarui', 'success');
            return redirect('proker');
        } else {
            toast('Bidang tidak ditemukan', 'error');
            return redirect('bidang');
        }
    }

    public function tampilBidang($id)
    {
        $bidang = Bidang::findOrFail($id);
        return view('frontend.articles.bidang', compact('bidang'));
    }
}
