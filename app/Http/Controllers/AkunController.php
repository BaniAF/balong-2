<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class AkunController extends Controller
{
    public function daftarAkun()
    {
        $user = Akun::paginate(5);
        return view('backend.pages.admin', ['user' => $user]);
    }

    public function tambahAkun(Request $request)
    {
        // Validasi data input
        $request->validate([
            'username' => 'required|unique:user',
            'namaUser' => 'required',
            'userpass' => 'required|min:6',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'namaUser.required' => 'Nama Akun harus diisi.',
            'userpass.required' => 'Password harus diisi.',
            'userpass.min' => 'Password minimal harus terdiri dari 6 karakter.',
        ]);

        // Mendapatkan id terakhir
        $lastAkun = Akun::orderBy('id', 'desc')->first();
        $lastId = $lastAkun ? intval(substr($lastAkun->id, 1)) : 0;

        // Membuat id baru dengan format "A001"
        $id = 'A' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        // Buat instansiasi objek Akun dengan data input
        $user = new Akun();
        $user->id = $id;
        $user->username = $request->username;
        $user->namaUser = $request->namaUser;
        $user->userpass = $request->userpass; // Menyimpan password mentah
        // Simpan akun ke database
        $user->save();

        // Redirect atau berikan respon sesuai kebutuhan
        toast('Akun berhasil ditambahkan.', 'success');
        return redirect('/akun');
    }

    public function editAkun(Request $request, $id)
    {
        $request->validate([
            'namaUser' => 'required',
            'userpass' => 'required|min:6',
        ], [
            'namaUser.required' => 'Silahkan masukkan nama user.',
            'userpass.required' => 'Silahkan masukkan password untuk user.',
            'userpass.min:6' => 'Password maksimal menggunakan 6 huruf / angka.',
        ]);

        // Cari program kegiatan berdasarkan id
        $user = Akun::find($id);

        if ($user) {
            // Cek apakah data username berubah
            if ($request->username != $user->username) {
                // Jika username berubah, lakukan validasi unik untuk kolom username
                $request->validate([
                    'username' => 'required|unique:user',
                ], [
                    'username.unique:user' => 'Username Telah Digunakan.',
                ]);
            }

            // Update data akun
            $user->username = $request->username;
            $user->namaUser = $request->namaUser;
            $user->userpass = $request->userpass;
            $user->save();

            // Redirect atau berikan respon sesuai kebutuhan
            toast('Akun berhasil diperbarui', 'success');
            return redirect('akun');
        } else {
            toast('Akun tidak ditemukan', 'error');
            return redirect('akun');
        }
    }

    public function hapusAkun($id)
    {
        // Cari postingan berdasarkan id
        $user = Akun::where('id', $id)->first();

        if ($user) {
            // Hapus data postingan dari database
            $user->delete();
            toast('Akun berhasil dihapus', 'success');
            return redirect('akun');
        } else {
            toast('Akun tidak ditemukan', 'error');
            return redirect('akun');
        }
    }
}
