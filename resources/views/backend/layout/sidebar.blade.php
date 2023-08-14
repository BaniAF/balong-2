<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('assets/img/logokab.png') }}" alt="" style="width:40px; height:4 0px">
            <span class="app-brand-text demo menu-text fw-bolder m-2 text-uppercase" style="font-size: 25px;">Kecamatan
                <br> BALONG</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item pt-4">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-file"></i>
                <div data-i18n="Layouts">Postingan</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/post" class="menu-link">
                        <div data-i18n="Without menu">Kelola Postingan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/kategoriPost" class="menu-link">
                        <div data-i18n="Without menu">Kelola Kategori</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/galeriPost" class="menu-link">
                        <div data-i18n="Without menu">Galeri Postingan</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="proker" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Program Kegiatan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/profil" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Account Settings">Profil</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/bidang" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Account Settings">Bidang</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="layanan-publik" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Layanan Publik</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="Regulasi" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-landmark"></i>
                <div data-i18n="Account Settings">Regulasi</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/list" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-bell-plus"></i>
                <div data-i18n="Account Settings">Pengumuman</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kelola</span>
        </li>
        <li class="menu-item">
            <a href="/buku-tamu" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-book-alt'></i>
                <div data-i18n="Account Settings">Data Buku Tamu</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/pegawai" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user'></i>
                <div data-i18n="Basic">Data Pegawai</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/saran" class="menu-link">
                <i class='menu-icon tf-icons bx bx-envelope'></i>
                <div data-i18n="Basic">Data Saran</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <!-- <i class="menu-icon tf-icons bx bx-lock-open-alt"></i> -->
                <i class='menu-icon tf-icons bx bxs-user-circle'></i>
                <div data-i18n="Authentications">Akun</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/akun" class="menu-link">
                        <div data-i18n="Basic">Daftar Akun</div>
                    </a>
                </li>
            </ul>
        </li>
         <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setting</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <!-- <i class="menu-icon tf-icons bx bx-lock-open-alt"></i> -->
                <i class='menu-icon tf-icons bx bx-collection'></i>
                <div data-i18n="Authentications">Items</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/menu" class="menu-link">
                        <div data-i18n="Basic">Menu Items</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->
