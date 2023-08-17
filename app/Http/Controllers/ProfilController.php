<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Profil;
use App\Models\profiles;
use App\Models\Submenu;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function daftarProfil()
    {
        // $profil = Profil::paginate(10);
        $profiles = Profil::all();
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

    public function saveFile($request, $profil, $buttonName)
    {
        if ($request->hasFile('file' . $buttonName) && $request->file('file' . $buttonName)->isValid()) {
            $file = $request->file('file' . $buttonName);
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
            
            if ($profil->fileStruktur && $profil->fileStruktur !== '-') {
                $path = public_path('uploads/File/' . $profil->fileStruktur);
                if (file_exists($path)) {
                    unlink($path); // Menghapus file yang sudah ada
                }
            }
            $profil->fileProfil = $filename; // Simpan nama file ke kolom yang sesuai dalam database
        }
    }
    public function editProfil(Request $request, $id)
    {
        $request->validate([
            'ketTugas' => 'nullable',
            'ketVisiMisi' => 'nullable',
            'ketOrg' => 'nullable',
            'ketStruktur' => 'nullable',
            'fileProfil' => 'max:45',
            'fileStruktur' => 'nullable|mimes:pdf|max:2048',
            'fileTugas' => 'nullable|mimes:pdf|max:2048',
            'fileOrg' => 'nullable|mimes:pdf|max:2048',
            'fileVisiMisi' => 'nullable|mimes:pdf|max:2048',
        ], [
            'fileStruktur.mimes' => 'File Struktur harus berformat PDF',
            'fileTugas.mimes' => 'File Tugas harus berformat PDF',
            'fileOrg.mimes' => 'File Organisasi harus berformat PDF',
            'fileVisiMisi.mimes' => 'File Visi Misi harus berformat PDF',
            'fileStruktur.max' => 'Ukuran File Struktur maksimal 2MB',
            'fileTugas.max' => 'Ukuran File Tugas maksimal 2MB',
            'fileOrg.max' => 'Ukuran File Organisasi maksimal 2MB',
            'fileProfil.max' => 'Nama File maksimal 50 Karakter',
            'fileVisiMisi.max' => 'Ukuran File Visi Misi maksimal 2MB',
        ]);
        // Cari program kegiatan berdasarkan id
        $profil = Profil::find($id);

        if ($profil) {
            if ($request->has('organisasi')) {
                # code...
                $profil->descProfil = $request->ketOrg;
                $this->saveFile($request, $profil, 'Org');
            } else if ($request->has('tugas')) {
                # code...
                $profil->descProfil = $request->ketTugas;
                $this->saveFile($request, $profil, 'Tugas');
            } else if ($request->has('visiMisi')) {
                # code...
                $profil->descProfil = $request->ketVisiMisi;
                $this->saveFile($request, $profil, 'VisiMisi');
            } elseif ($request->has('struktur')) {
                $profil->descProfil = $request->ketVisiMisi;
                $this->saveFile($request, $profil, 'Struktur');
            }
            // Update data program kegiatan

            // if ($request->hasFile('fileRegulasi')) {
            //     if ($profil->fileProfil) {
            //         $oldFilePath = public_path('uploads/File/' . $profil->fileProfil);
            //         if (file_exists($oldFilePath)) {
            //             unlink($oldFilePath);
            //         }
            //     }

            //     // Store the new fileRegulasi and update the fileRegulasi attribute in the database
            //     $file = $request->file('fileProfil');
            //     $filename = $id . '_' . $file->getClientOriginalName();
            //     $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
            //     $profil->fileProfil = $filename;
            // }

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
        $Profil = Profil::all();
        $pegawai = Pegawai::all();
        return view('frontend.articles.profil', compact('Profil', 'pegawai'));
    }
}
