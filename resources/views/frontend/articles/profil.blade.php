@extends('frontend.layouts.app')

@section('title')
Profil
@endsection

@section('content')

<div class="container mx-auto px-4 py-8">
  @php
  $activeMenuId = request('id');
  @endphp

  @if ($activeMenuId == 5)
  <div class="overflow-x-auto">
    <table class="table">
      <!-- head -->
      <thead>
        <tr>
          <th></th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Pendidikan</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pegawai as $item)
        <!-- row 1 -->
        <tr>
          <td>
            <div class="avatar">
              <div class="mask mask-squircle w-12 h-12">
                <img src="{{ asset('uploads/Pegawai/'. $item->fotoPegawai) }}" alt="Foto Pegawai" />
              </div>
            </div>
          </td>
          <td>
            <div class="font-bold text-lg">{{ $item->namaPegawai }}</div>
            <div class="text-md opacity-50">{{ $item->nip }}</div>
          </td>
          <td>
            <div class="text-lg">
              {{ $item->jabatan }}
            </div>
            <span class="badge badge-ghost badge-md font-semibold">{{ $item->pangkat }}</span>
          </td>
          <td>
            <div class="text-lg">
              @if ($item->pendTerakhir)
              {{ $item->pendTerakhir }}
              @else
              -
              @endif
            </div>
          </td>
          <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @elseif ($activeMenuId == 4)
  @if (!$Profil->isEmpty())
  <div class="container p-4">
    <h1 class="font-bold text-3xl">Visi, Misi, Tujuan, & Sasaran</h1>
    <div class="stats stats-vertical lg:stats-horizontal shadow mt-4 justify-center items-center flex">
      <div class="stat">
        <div class="stat-title">Visi</div>
        <div class="stat-value">{!! $Profil[0]->visi !!}</div>
      </div>
      <div class="stat">
        <div class="stat-title">Misi</div>
        <div class="stat-value">{!! $Profil[0]->misi !!}</div>
      </div>
      <div class="stat">
        <div class="stat-title">Sasaran</div>
        <div class="stat-value">{!! $Profil[0]->sasaran !!}</div>
      </div>
      <div class="stat">
        <div class="stat-title">Tujuan</div>
        <div class="stat-value">{!! $Profil[0]->tujuan !!}</div>
      </div>
    </div>
  </div>
  @endif
  @elseif ($activeMenuId == 3)
  @if (!$Profil->isEmpty())
  <div class="container p-4">
    <h1 class="font-bold text-3xl">Struktur Organisasi</h1>
    <p>{{ $Profil[0]->ketStruktur }}</p>
    @if ($Profil[0]->fileStruktur && pathinfo($Profil[0]->fileStruktur, PATHINFO_EXTENSION) === 'pdf')
    <div class="mt-4">
      <iframe src="{{ asset('uploads/File/' . $Profil[0]->fileStruktur) }}" class="w-full h-auto"
        style="min-height: 400px;"></iframe>
    </div>
    @else
    <p class="text-gray-400 mt-4">Tidak ada dokumen yang ditampilkan</p>
    @endif
  </div>
  @endif
  @elseif ($activeMenuId == 2)
  @if (!$Profil->isEmpty())
  <div class="container p-4">
    <h1 class="font-bold text-3xl">Tugas dan Fungsi</h1>
    <p>{!! $Profil[0]->tugasFungsi !!}</p>
  </div>
  @endif
  @elseif ($activeMenuId == 1)
  @if (!$Profil->isEmpty())
  <div class="container p-4">
    <h1 class="font-bold text-3xl">Organisasi & Tata Kerja</h1>
    <p>{!! $Profil[0]->orgTataKerja !!}</p>
  </div>
  @endif
  @endif
</div>
@endsection