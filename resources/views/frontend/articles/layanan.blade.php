@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    LAYANAN PUBLIK
@endsection

@section('content')
    <div class="container m-2 p-4">
        <h1 class="font-bold text-3xl text-center">Layanan Publik</h1>
        @foreach ($publik as $item)
        @endforeach
        <div class="overflow-x-auto m-4 ml-10">
            <table class="table">
              <!-- head -->
              <thead class="text-md text-center">
                <tr>
                  <th>Nama Layanan</th>
                  <th>Deskripsi Layanan</th>
                  <th>Keterangan</th>
                  <th>Ketentuan</th>
                  <th>Waktu</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr  class="hover text-md text-center">
                    @foreach ($publik as $item)           
                    <td>{{$item->namaLayanan}}</td>
                    <td>{{$item->descLayanan}}</td>
                    <td>,{{$item->keterangan}}</td>
                    <td>,{{$item->persyaratan}}</td>
                    <td>{{$item->jam_operasional}}</td>
                    @endforeach
                </tr>
              </tbody>
            </table>
          </div>

    </div>
@endsection
