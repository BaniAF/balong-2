@extends('frontend.layouts.app') <!-- Pastikan layout sesuai dengan layout yang Anda gunakan -->
@section('title')
    Profil
@endsection

@section('content')

<div class="container m-2 p-4">
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
                            <img src="{{ asset ('uploads/Pegawai/'. $item->fotoPegawai)}}" alt="Avatar Tailwind CSS Component" />
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
                    <br/>
                    <span class="badge badge-ghost badge-md">{{ $item->pangkat }}</span>
                  </td>
                  <td>Purple</td>
                  <th>
                  </th>
                </tr>
                @endforeach
              </tbody>
              <!-- foot -->
              <tfoot>
                
              </tfoot>
              
            </table>
          </div>
            {{-- <h1>{{ $item->namaPegawai }}</h1> --}}
            
    @elseif ($activeMenuId == 4)
        @if (!$Profil->isEmpty())
        <div class="container p-4 m-2 flex justify-center items-center">
            <h1 class="font-bold text-3xl"> Visi, Misi, Tujuan, & Sasaran</h1>
            {{-- <h1 class="fw-bolder">VISI</h1>
            <h1>{!! $Profil[0]->visi !!}</h1>
            <h1 class="fw-bolder">MISI</h1>
            <h1>{!! $Profil[0]->misi !!}</h1> --}}

            <div class="stats stats-vertical lg:stats-horizontal shadow mt-4">
  
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
            <div class="container m-2 p-4 ">
                <h1 class="font-bold text-3xl">Struktur Organisasi</h1>
                <p> {{ $Profil[0]->ketStruktur }}</p>
                @if ($Profil[0]->fileStruktur && pathinfo($Profil[0]->fileStruktur, PATHINFO_EXTENSION) === 'pdf')
                    <div class="m-2 p-2 flex justify-center items-center">
                        <iframe src="{{ asset('uploads/File/' . $Profil[0]->fileStruktur) }}" width="100%" height="600px"></iframe>
                    </div>
                @else
                <p class="text-gray-100">tidak ada dokumen yang ditampilkan</p>
                @endif
                <!-- Tampilkan detail Proker lainnya sesuai kebutuhan -->
            </div>

        @endif

    @elseif ($activeMenuId == 2)
        @if (!$Profil->isEmpty())
            <h1 class="fw-bolder">Tugas dan Fungsi</h1>
            <h1>{!! $Profil[0]->visi !!}</h1>
            <h1 class="fw-bolder">MISI</h1>
            <h1>{!! $Profil[0]->misi !!}</h1>

        @endif

    @elseif ($activeMenuId == 1)
        @if (!$Profil->isEmpty())
            <h1 class="fw-bolder">Organisasi & Tata Kerja</h1>
            <h1>{!! $Profil[0]->visi !!}</h1>
            <h1 class="fw-bolder">MISI</h1>
            <h1>{!! $Profil[0]->misi !!}</h1>

        @endif
    @endif
</div>
@endsection

