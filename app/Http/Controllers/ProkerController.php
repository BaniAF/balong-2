<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use App\Models\Image_Kegiatan;

use Illuminate\Http\Request;

class ProkerController extends Controller
{
    public function daftarProker()
    {
        $prokerja = Proker::paginate(10);
        return view('backend.pages.proker', ['prokerja' => $prokerja]);
    }
    public function tambahImage()
    {
        $prokerja = Proker::all();
        return view('backend/pages/galeri/tambah-galeri', ['prokerja' => $prokerja]);
    }

    public function tambahFotoKegiatan(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'proker' => 'required|exists:proker,id',
            'fotoPost.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar dengan ekstensi jpeg, png, atau jpg dengan ukuran maksimum 2 MB
        ]);
        $lastPost = Image_Kegiatan::orderBy('id', 'desc')->first();
        $lastId = $lastPost ? intval(substr($lastPost->id, 2)) : 0;

        // Membuat id baru dengan format "P001"
        $id = 'FK' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);
        $idProgramKegiatan = $request->input('proker');
        $files = $request->file('fotoPost');

        foreach ($files as $file) {
            $namaFoto = $idProgramKegiatan . ' - ' . $file->getClientOriginalName();
            $file->move(public_path('uploads/Foto-Kegiatan/'), $namaFoto);

            Image_Kegiatan::create([
                'id' => $id,
                'image' => $namaFoto,
                'kodeProker' => $idProgramKegiatan,
            ]);
        }
        toast('Foto berhasil ditambahkan', 'success');
        return redirect('galeriPost');
        // return redirect()->back(); // Redirect kembali ke halaman sebelumnya setelah data berhasil disimpan
    }
    // fungsi tambah post
    public function tambahProgram(Request $request)
    {
        $request->validate([
            'namaProker' => 'required',
            'descProker' => 'required',
            'fileProgram' => 'nullable|mimes:pdf|max:2048',
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
        // Simpan file jika ada file yang diunggah
        if ($request->hasFile('fileProgram') && $request->file('fileProgram')->isValid()) {
            $file = $request->file('fileProgram');
            $filename = $id . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
            $proker->fileProgram = $filename; // Simpan nama file ke kolom fileProgram dalam database
        } else {
            $proker->fileProgram = '-';
        }
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

    public function hapusImageProgram(Request $request)
    {
        $imageName = $request->input('image_name');
        $imageId = $request->input('kodeProker'); // Anda harus mengirimkan id gambar juga

        // Cari postingan dengan image yang sesuai
        $fotoKegiatan = Image_Kegiatan::where('image', $imageName)
            ->where('kodeProker', $imageId)
            ->first();

        if ($fotoKegiatan) {
            // Hapus file gambar dari folder uploads/Foto-Kegiatan menggunakan unlink
            $imagePath = public_path('uploads/Foto-Kegiatan/' . $fotoKegiatan->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Hapus data postingan dari database
            $fotoKegiatan->delete();

            toast('Foto berhasil dihapus', 'success');
        } else {
            toast('Foto tidak ditemukan', 'error');
        }

        return redirect('galeriPost');
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

            if ($request->hasFile('fileProgram')) {
                if ($proker->fileProgram) {
                    $oldFilePath = public_path('uploads/File/' . $proker->fileProgram);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Store the new fileProgram and update the fileProgram attribute in the database
                $file = $request->file('fileProgram');
                $filename = $id . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/File/'), $filename); // Simpan file ke direktori tujuan
                $proker->fileProgram = $filename;
            }

            $proker->save();
            // Redirect atau berikan respon sesuai kebutuhan
            toast('Program Kegiatan berhasil diperbarui', 'success');
            return redirect('proker');
        } else {
            toast('Program Kegiatan tidak ditemukan', 'error');
            return redirect('proker');
        }
    }

    public function tampil($id)
    {
        $program = Proker::findOrFail($id);
        return view('frontend.articles.proker', compact('program'));
    }

    public function tampilKode($kode)
    {
        $program = Proker::where('id', $kode)->firstOrFail(); // Menggunakan 'id' sebagai kolom kode
        return view('frontend.articles.proker_detail', compact('program'));
    }
}
