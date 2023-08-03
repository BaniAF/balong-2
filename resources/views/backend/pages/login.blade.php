<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - SIBALONG</title>
    @include('admin.layout.headscript')
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    @vite('resources/js/app.js')
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info fw-bolder text-center">Silahkan Login</div>
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo me-2">
                                    <img src="{{ asset('assets/img/logokab.png') }}" alt=""
                                        style="width:auto; height:70px">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder text-uppercase">KECAMATAN <br>
                                    BALONG</span>
                            </a>
                        </div>
                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" placeholder="Masukkan username" autofocus>
                                @error('username')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="userpass"
                                        class="form-control @error('userpass') is-invalid @enderror" name="userpass"
                                        placeholder="Masukkan Password" aria-describedby="password">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    @include('admin.layout.script')
    <script>
        @if ($errors->has('message'))
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '{{ $errors->first('message') }}',
            });
        @endif
    </script>

</body>

</html>
