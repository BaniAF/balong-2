<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\anggota;
use App\Models\bidang;

class anggotaController extends Controller
{
    public function tampilAnggota(){
        $dataAnggota = anggota::all();
        $dataBidang = bidang::all();

        return view('admin.kelolaAnggotaAdmin', ['dataAnggota'=>$dataAnggota], ['dataBidang'=>$dataBidang]);
    }

    public function detailAnggota($id){
        $dataAnggotaPilih = anggota::find($id);
    
        if (!$dataAnggotaPilih) {
            return redirect()->route('/kelolaAnggota')->with('error', 'Anggota tidak ditemukan');
        }
    
        // return view('/detail-anggota/{$id}', ['dataAnggotaPilih' => $dataAnggotaPilih]);
        return response()->json($dataAnggotaPilih);
    }

    // tampil nama bidang
    private function namaBidang(){
        $dataBidang = bidang::all();
        return (['dataBidang'=>$dataBidang]);
    }
    
    public function store(Request $request){
        //VALIDASI FORM
        // dd($request->all());
        $message=[
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
            'regex' => ':attribute harus berupa huruf dan spasi'
        ];
    
        $this->validate($request, [
            'nipAnggota' => 'required|numeric|unique:tb_anggota',
            'namaAnggota' => ['required', 'regex:/^[A-Za-z\s]+$/'],
            'jabatanAnggota' => 'required',
            'nomorHpAnggota' => 'numeric'
        ], $message);

        $data = new anggota(); // Model menggunakan anggota
        $data->nipAnggota = $request->nipAnggota;
        $data->namaAnggota = $request->namaAnggota;
        $data->jabatanAnggota = $request->jabatanAnggota;
        $data->nomorHpAnggota = $request->nomorHpAnggota;
        $data->bidangAnggota = $request->bidangAnggota;

        $data->save();
        toast('Data berhasil DItambahkan','success');
        return redirect('/kelolaAnggota');
    }

    public function update(Request $request, $id){
        $message=[
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
            'regex' => ':attribute harus berupa huruf dan spasi'
        ];
    
        $this->validate($request, [
            'namaAnggota' => ['required', 'regex:/^[A-Za-z\s]+$/'],
            'jabatanAnggota' => 'required',
            'nomorHpAnggota' => 'numeric'
        ], $message);

        $data = anggota::find($id);
        $data->namaAnggota = $request->namaAnggota;
        $data->jabatanAnggota = $request->jabatanAnggota;
        $data->nomorHpAnggota = $request->nomorHpAnggota;
        $data->bidangAnggota = $request->bidangAnggota;
        $data->save();
        return redirect('/kelolaAnggota')->with('success', 'Data Berhasil Diubah');
    }
    
    public function hapus($nip){
        $data = anggota::find($nip);
        $data->delete();
        return redirect('/kelolaAnggota')->with('success', 'Data Berhasil Dihapus');
    }

    public function destroy(Request $request)
    {
        $selectedItems = json_decode($request->input('selected_items'));

        if (empty($selectedItems)) {
            return redirect('/kelolaAnggota')->with('error', 'Pilih setidaknya satu anggota untuk dihapus.');
        }

        // Menggunakan model 'anggota' untuk menghapus data dari database
        // Pastikan model 'anggota' sesuai dengan nama model yang benar dalam aplikasi Anda
        anggota::whereIn('nipAnggota', $selectedItems)->delete();

        return redirect('/kelolaAnggota')->with('success', 'Anggota berhasil dihapus.');
    }

}
