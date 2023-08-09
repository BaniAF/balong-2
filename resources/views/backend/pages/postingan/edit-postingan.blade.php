@section('title')
    POSTINGAN - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')
@section('content')
@include('sweetalert::alert')
<h6 class="fw-bold mb-4"><span class="text-muted fw-light">Postingan /</span> Edit Postingan</h6>
@if ($errors->any())
    <script>
        Swal.fire({
            title: "Error",
            text: "Data Invalid!",
            icon: "error",
            button: "OK"
        });
    </script>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!-- Tampilan Edit Berita -->
<div class="card">
    <div class="card-body">
        <div class="card-title d-flex align-items-center justify-content-between">
            <h5 class="fw-semibold">Edit Postingan</h5>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ route('postingan.update', $post->id) }}">
            @csrf
            <div class="row ">
                <div class="col-3 border bordered-black">
                    <label class="form-label">Preview Foto</label>
                    <div class="avatar-preview">
                        <img id="editImagePreview" src="{{ asset('uploads/Artikel/' . $post->fotoPost) }}" class="img-fluid" style="max-height: 250px;">
                    </div>
                    <!-- <label for="imageUpload" class="form-label mt-2">Upload Foto</label> -->
                    <input type="file" id="editImageUpload" name="fotoPost" accept=".png, .jpg, .jpeg" class="d-none" />
                    <label for="editImageUpload" class="btn btn-primary mt-2 mb-2 btn-md w-100">Pilih Foto</label>
                </div>
                <div class="col-9">
                    <label for="nameBackdrop" class="form-label">Judul Postingan</label>
                    <input
                        type="text"
                        name="judulPost"
                        id="judulPost"
                        class="form-control"
                        placeholder="Contoh : Hari Jadi Kecamatan Balong"
                        value="{{ $post->judulPost }}"
                    />
                    <label for="nameBackdrop" class="form-label mt-2">Isi Postingan</label>
                    <textarea 
                        name="isiPost" 
                        id="isiPostEdit" 
                        cols="10" 
                        rows="3"
                        class="form-control isi-edit"
                        placeholder="Isi Postingan / Berita"
                        ></textarea>
                    <div class="col mb-0 mt-3">
                        <label for="dobBackdrop" class="form-label">Kategori Postingan</label>
                        <select name="kategoriPost" id="kategoriPost" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            @foreach($kategoriList as $kategori)
                                <option value="{{ $kategori->id }}" 
                                @if($kategori->id === $post->kategoriPost) 
                                    selected 
                                @endif
                                >
                                {{ $kategori->namaKategori }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="userPost" value="{{ Auth::user()->namaUser }}">
            <!-- <input type="input" name="userPost" value="{{ $post->id }}"> -->
            <input type="hidden" name="statusPost" id="statusPost"  value="{{ $post->statusPost }}">
            <div class="mt-3 d-flex justify-content-end">
                @if($post->statusPost === 'Belum Diposting')
                    <button type="submit" class="btn btn-success me-2" name="submitType" value="simpan">Posting</button>
                    @endif
                    <button type="submit" class="btn btn-primary me-2" name="submitType" value="simpan">Simpan</button>
                    <button type="button" class="btn btn-danger" name="submitType" onclick="goBack()">Batal</button>
            </div>
        </form>
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#isiPostEdit'), {
            ckfinder: {
                uploadUrl: '{{ route('image.upload') }}?_token={{ csrf_token() }}',
            }
        })
        .then( editor => {
            // Set data dari $post->isiPost ke CKEditor
            editor.setData( `{!! $post->isiPost !!}` );
        })
        .catch( error => {
            console.error( error );
        });

    function goBack() {
        window.history.back();
    }
    
</script>
@endsection