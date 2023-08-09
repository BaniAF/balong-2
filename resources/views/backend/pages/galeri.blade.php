@section('title')
    GALERI POSTINGAN - KECAMATAN BALONG
@endsection
@extends('backend.layout.master')
@section('content')
    <style>
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px 10px 0px 0px;
        }

        .card-galeri {
            border-radius: 10px 10px 0px 0px;
        }

        .card:hover .overlay {
            opacity: 1;
        }

        .bxs-show, .bxs-trash {
            font-size: 48px;
            color: white;
        }
    </style>
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Postingan /</span> Galeri Postingan</h6>

    <h3 class="fw-bold m-2">Cover Artikel</h3>
    <hr>
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-2">
        @foreach ($dataGaleri as $post)
            <div class="col">
                <div class="card card-galeri h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ asset('uploads/Artikel/' . $post->fotoPost) }}" alt="Card image cap"
                            style="object-fit: cover; height: 200px;">
                        <div class="overlay" >
                            <i class='bx bxs-show' onclick="showImage('{{ asset('uploads/Artikel/' . $post->fotoPost) }}')"></i>
                        </div>
                    </div>
                    <div class="card-body p-2 mb-0">
                        <h4 class="card-title text-black text-capitalize">{{ $post->judulPost }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="fw-bold m-2 mt-4">Program Kegiatan</h3>
        <a href="/tambah-foto" class="btn btn-md bg-primary mb-2 text-white fw-semibold"><i class='bx bx-plus me-2'></i>Tambah Foto
        </a>
    </div>
    <hr>
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-2">
        @foreach ($galeriKegiatan as $fotoK)
            <div class="col">
                <div class="card card-galeri h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ asset('uploads/Foto-Kegiatan/' . $fotoK->image) }}" alt="Card image cap"
                            style="object-fit: cover; height: 200px;">
                        <div class="overlay" onclick="showImage('{{ asset('uploads/Foto-Kegiatan/' . $fotoK->image) }}')">
                            <i class='bx bxs-show'></i>
                        </div>
                    </div>
                    <div class="card-body p-2 mb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-black text-capitalize">{{ $fotoK->proker->namaProker }}</h4>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('deleteImage') }}" method="post" id="deleteForm">
                                @csrf
                                 <input type="hidden" name="image_name" value="{{ $fotoK->image }}">
                                 <input type="text" name="kodeProker" value="{{ $fotoK->kodeProker }}">
                                <button class="tf-icons btn btn-sm btn-icon btn-outline-danger me-1 rounded-pill show_confirm" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true" title="<span>Delete</span>">
                                    <i class="bx bx-trash bx-s m-1"></i>
                                </button>
                                <!-- Tombol "Delete" -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <img id="modalImage" src="" alt="Modal Image" style="width: 100%; border-radius:8px">
                </div>
            </div>
        </div>
    </div>
    <script>
        function showImage(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            $('#imageModal').modal('show');
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.show_confirm');
            
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin menghapus foto ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
