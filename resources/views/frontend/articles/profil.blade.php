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
        @foreach ($pegawai as $item)
            <h1>{{ $item->namaPegawai }}</h1>
        @endforeach
    @elseif ($activeMenuId == 4)
        @if (!$Profil->isEmpty())
            <h1 class="fw-bolder">VISI</h1>
            <h1>{!! $Profil[0]->visi !!}</h1>
            <h1 class="fw-bolder">VISI</h1>
            <h1>{!! $Profil[0]->misi !!}</h1>

        @endif
    @endif
</div>
@endsection

