
@include('sweetalert::alert')
    <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Dashboard /</span> Menu Item</h6>
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
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-center justify-content-between">
                <h5 class="fw-semibold">Daftar Menu</h5>
                {{-- <button class="btn btn-md bg-primary mb-2 text-white fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#backDropModal" type="button">
                    <i class='bx bxs-cloud-upload'></i> | Tambah Gambar
                </button> --}}
            </div>
            <table class="table table-bordered">
                <thead class="text-center fw-bolder">
                    <tr>
                        <th style="width: 20px">No</th>
                        <th>Label</th>
                        <th>Url</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                        @foreach ($menus as $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td>
                                    {{ $item->label }}
                                </td>
                                <td class="text-center">
                                    {{ $item->url }}
                                </td>
                                <td class="text-center aligns-item-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center posting-form">
                                        <!-- Tombol Aktifkan / Nonaktifkan -->
                                        <form action="{{ route('menu.aktifkan', $item->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-icon btn-outline-secondary me-1 rounded-pill"
                                                type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                data-bs-placement="bottom" data-bs-html="true"
                                                title="<span>{{ $item->status ? 'Nonaktifkan' : 'Aktifkan' }}</span>">
                                                @if ($item->status)
                                                    <i class="bx bxs-check-circle bx-m m-1" style='color:#07d51b'></i>
                                                @else
                                                    <i class="bx bxs-x-circle bx-m m-1" style='color:#d50707'></i>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

