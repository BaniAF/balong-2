@section('title')
    GALERI POSTINGAN - KECAMATAN BALONG
@endsection
@extends('admin.layout.master')
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

        .bxs-show {
            font-size: 48px;
            color: white;
        }
    </style>
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Postingan /</span> Galeri Postingan</h6>

    <!-- <div class="card">
        <div class="card-body"> -->
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-2">
        @foreach ($dataGaleri as $post)
            <div class="col">
                <div class="card card-galeri h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ asset('uploads/' . $post->fotoPost) }}" alt="Card image cap"
                            style="object-fit: cover; height: 200px;">
                        <div class="overlay" onclick="showImage('{{ asset('uploads/' . $post->fotoPost) }}')">
                            <i class='bx bxs-show'></i>
                        </div>
                    </div>
                    <div class="card-body p-2 mb-0">
                        <h4 class="card-title text-black text-capitalize">{{ $post->judulPost }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- </div>
    </div> -->
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
@endsection
