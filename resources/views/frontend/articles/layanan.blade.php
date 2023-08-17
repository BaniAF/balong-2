@extends('frontend.layouts.app')

@section('title')
LAYANAN PUBLIK
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
  <h1 class="font-bold text-3xl text-center mb-4">Layanan Publik</h1>
  <div class="overflow-x-auto">
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
        <!-- rows -->
        @foreach ($publik as $item)
        <tr class="hover:text-md text-center">
          <td>{{ $item->namaLayanan }}</td>
          <td>{{ $item->descLayanan }}</td>
          <td>{{ $item->keterangan }}</td>
          <td>{{ $item->persyaratan }}</td>
          <td>{{ $item->jam_operasional }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection