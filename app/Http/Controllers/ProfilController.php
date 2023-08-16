<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\profiles;
use App\Models\Submenu;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function daftarProfil()
    {
        // $profil = Profil::paginate(10);
        $profiles = profiles::all();
        return view('backend.pages.profil', ['profiles' => $profiles]);
    }
    public function tambahImage()
    {
        $profil = Profil::all();
        return view('backend/pages/galeri/tambah-galeri', ['profil' => $profil]);
    }

    // fungsi tambah post
    public function tambahProfil(Request $request)
    {
        $request->validate([
            'namaProfil' => 'required',
            'descProfil' => 'required',
            'fileProfil' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Mendapatkan id terakhir
        $lastProfil = Profil::orderBy('id', 'desc')->first();
        $lastProfil = $lastProfil->id + 1;
        // $lastId = $lastRegulasi ? intval(substr($lastRegulasi->id, 2)) : 0;

        // // Membuat id baru dengan format "PK001"
        // $id = 'PK' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);
        // Simpan data program kegiatan ke database
        $profil = new Profil();
        $profil->namaProfil = $request->namaProfil;
        $profil->descProfil = $request->descProfil;
        // Simpan file jika ada file yang diunggah
        if ($request->hasFile('fileProfil') && $request->file('fileProfil')->isValid()) {
            $file = $request->file('fileProfil');
            $filename = $lastProfil . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
            $profil->fileProfil = $filename; // Simpan nama file ke kolom fileRegulasi dalam database
        } else {
            $profil->fileProfil = '-';
        }
        $profil->save();

        $submenu = new Submenu();
        $submenu->label = $request->namaProfil;
        $submenu->url = '/regulasi/{id}';
        $submenu->menu_id = 5;
        $submenu->status = 1;
        $submenu->save();

        // Redirect atau berikan respon sesuai kebutuhan
        toast('Regulasi berhasil ditambahkan', 'success');
        return redirect('profil');
    }

    public function editProfil(Request $request, $id)
    {
        $request->validate([
            'visi' => 'nullable',
            'tujuan' => 'nullable',
            'sasaran' => 'nullable',
            'misi' => 'nullable',
            'ketStruktur' => 'nullable',
            'fileStruktur' => 'nullable|mimes:jpg, png, jpeg|max:2048',
        ]);
        // dd($request->all());
        // dd($id);
        // Cari program kegiatan berdasarkan id
        $profil = Profiles::find($id);
        // dd($request->all());
        if ($profil) {            
            if ($request->has('visimisi')) {
                # code...
                $profil->visi = $request->visi;
                $profil->misi = $request->misi;
            } else if ($request->has('tujuan')) {
                # code...
                $profil->sasaran = $request->sasaran;
                $profil->tujuan = $request->tujuanP;
            } elseif ($request->has('struktur')) {
                if ($request->ketStruktur === null) {
                    $profil->ketStruktur = "-";
                } else {
                    $profil->ketStruktur = $request->ketStruktur;
                }

                if ($request->hasFile('fotoStruktur')) {
                // Upload file foto baru
                    $fileFoto = $request->file('fotoStruktur');
                    // dd($fileFoto);
                    $namaFoto = $fileFoto->getClientOriginalName();
                    $fileFoto->move(public_path('uploads/images'), $namaFoto);
                    // Hapus foto lama (jika ada)
                    if ($profil->fileStruktur) {
                        $oldPath = public_path('uploads/images/' . $profil->fileStruktur);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                    $profil->fileStruktur = $namaFoto;
                }
            }
            $profil->save();
            // Redirect atau berikan respon sesuai kebutuhan
            toast('Profil berhasil diperbarui', 'success');
            return redirect('profil');
        } else {
            toast('Profil tidak ditemukan', 'error');
            return redirect('profil');
        }
    }

    public function tampilProfil()
    {
        $Profil = profiles::all();
        return view('frontend.articles.profil', compact('Profil'));
    }
}
