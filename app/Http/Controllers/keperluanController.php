<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keperluan;

class keperluanController extends Controller
{
    //
    public function tampilKeperluan(){
        $dataKeperluan = keperluan::all();
        return view('admin.kelolaKeperluanAdmin', ['dataKeperluan'=>$dataKeperluan]);
    }

    public function store(Request $request){
        //VALIDASI FORM
        $message=[
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
            'regex' => ':attribute harus berupa huruf dan spasi'
        ];
    
        $this->validate($request, [
            'kdKeperluan' => 'required|numeric|unique:tb_keperluan',
            'namaKeperluan' => ['required', 'regex:/^[A-Za-z\s]+$/'],
            'bidangKeperluan' => 'required',
            'keteranganKeperluan' => 'required'
        ], $message);

        $data = new keperluan(); // Model menggunakan anggota
        $data->kdKeperluan = $request->kdKeperluan;
        $data->namaKeperluan = $request->namaKeperluan;
        $data->bidangKeperluan = $request->bidangKeperluan;
        $data->keteranganKeperluan = $request->keteranganKeperluan;

        $data->save();
        toast('Data berhasil Ditambahkan','success');
        return redirect('/kelolaKeperluan');
    }

    public function update(Request $request, $id){
        $message=[
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
            'regex' => ':attribute harus berupa huruf dan spasi'
        ];
    
        $this->validate($request, [
            'kdKeperluan' => 'required|numeric|unique:tb_keperluan',
            'namaKeperluan' => ['required', 'regex:/^[A-Za-z\s]+$/'],
            'bidangKeperluan' => 'required',
            'keteranganKeperluan' => 'required'
        ], $message);

        $data = keperluan::find($id);
        $data->namaKeperluan = $request->namaKeperluan;
        $data->bidangKeperluan = $request->bidangKeperluan;
        $data->keteranganKeperluan = $request->keteranganKeperluan;
        $data->save();
        return redirect('/kelolaKeperluan')->with('success', 'Data Berhasil Diubah');
    }

    public function hapus($nip){
        $data = keperluan::find($nip);
        $data->delete();
        return redirect('/kelolaKeperluan')->with('success', 'Data Berhasil Dihapus');
    }
}
