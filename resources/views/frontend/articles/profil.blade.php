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
    <div class="overflow-x-auto ml-28">
        <table class="table ">
            <!-- head -->
            <thead>
                <tr class="text-lg">
                  <th>
                    
                  </th>
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
                    <th>
                  </th>
                  <td>
                      <div class="flex items-center space-x-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                            <img src="{{ asset ('uploads/Pegawai/'. $item->fotoPegawai)}}" alt="Foto Pegawai" />
                        </div>
                    </div>
                    <div>
                        <div class="font-bold text-lg">{{ $item->namaPegawai }}</div>
                        <div class="text-md opacity-50">{{ $item->nip }}</div>
                    </div>
                    </div>
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
                  <th>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
            {{-- <h1>{{ $item->namaPegawai }}</h1> --}}
            
    @elseif ($activeMenuId == 4)
        @if (!$Profil->isEmpty())
        <div class="container p-4 m-2">
            <h1 class="font-bold text-3xl text-center"> Visi, Misi, Tujuan, & Sasaran</h1>
            <p>{!! $Profil[3]->descProfil !!}</p>
              @if ($Profil[3]->fileProfil && pathinfo($Profil[3]->fileProfil, PATHINFO_EXTENSION) === 'pdf')
                <div class="m-2 p-2 flex justify-center items-center">
                    <iframe src="{{ asset('uploads/File/' . $Profil[3]->fileProfil) }}" width="100%" height="600px"></iframe>
                </div>
            @else
            <p class="text-grey">Tidak ada dokumen yang ditampilkan</p>
            @endif
        </div>
        @endif
    @elseif ($activeMenuId == 3)
        @if (!$Profil->isEmpty())
            <div class="container m-2 p-4 ">
                <h1 class="font-bold text-3xl">Struktur Organisasi</h1>
                <p> {!! $Profil[2]->descProfil !!}</p>
                @if ($Profil[2]->fileProfil && pathinfo($Profil[2]->fileProfil, PATHINFO_EXTENSION) === 'pdf')
                    <div class="m-2 p-2 flex justify-center items-center">
                        <iframe src="{{ asset('uploads/File/' . $Profil[2]->fileProfil) }}" width="100%" height="600px"></iframe>
                    </div>
                @else
                <p class="text-grey">Tidak ada dokumen yang ditampilkan</p>
                @endif
                <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
            </div>
        @endif
    @elseif ($activeMenuId == 2)
        @if (!$Profil->isEmpty())
          <div class="container m-2 p-4 ">
              <h1 class="font-bold text-3xl">Struktur Organisasi</h1>
              <p> {!! $Profil[1]->descProfil !!}</p>
              @if ($Profil[1]->fileProfil && pathinfo($Profil[1]->fileProfil, PATHINFO_EXTENSION) === 'pdf')
                  <div class="m-2 p-2 flex justify-center items-center">
                      <iframe src="{{ asset('uploads/File/' . $Profil[1]->fileProfil) }}" width="100%" height="600px"></iframe>
                  </div>
              @else
              <p class="text-grey">Tidak ada dokumen yang ditampilkan</p>
              @endif
              <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
          </div>
        @endif

    @elseif ($activeMenuId == 1)
        @if (!$Profil->isEmpty())
            <div class="container m-2 p-4 ">
                <h1 class="font-bold text-3xl">Struktur Organisasi</h1>
                <p> {!! $Profil[0]->descProfil !!}</p>
                @if ($Profil[0]->fileProfil && pathinfo($Profil[0]->fileProfil, PATHINFO_EXTENSION) === 'pdf')
                    <div class="m-2 p-2 flex justify-center items-center">
                        <iframe src="{{ asset('uploads/File/' . $Profil[0]->fileProfil) }}" width="100%" height="600px"></iframe>
                    </div>
                @else
                <p class="text-grey">Tidak ada dokumen yang ditampilkan</p>
                @endif
                <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
            </div>
        @endif
    @endif
</div>
@endsection