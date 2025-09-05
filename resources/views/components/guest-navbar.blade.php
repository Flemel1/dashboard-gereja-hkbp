<div>
    <div class="navbar-wrapper">
        <nav id="navbar" class="navbar navbar-expand-lg">
            <div class="container">
                <img src="{{ asset('assets/image/logohkbp.png') }}" width="100" />
                <a class="navbar-brand ms-3 me-5" href="{{ route('home') }}">
                    HKBP KLATEN
                </a>

                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house-chimney"></i>
                            BERANDA</a>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-group"></i> TENTANG KAMI
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah HKBP</a></li>
                                <li><a class="dropdown-item" href="{{ route('visi-misi') }}">Visi Misi HKBP</a></li>
                                <li><a class="dropdown-item" href="#">Staff HKBP</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kegiatan.php"> KEGIATAN</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-list-ul"></i> KOLEKSI
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Renungan</a></li>
                                <li><a class="dropdown-item" href="#">Galery</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                        </li>

                        </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Navbar -->

    <!-- Jumbotron -->
    <div id="carouselHome" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/image/jumbotron/jumbotron.webp" class="d-block w-100" height="400px" alt="Beranda">
                <div class="carousel-caption d-md-block">
                    <p>Buku</p>
                    <h3>Buku Terlengkap dan Terpercaya</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/image/jumbotron/jumbotron2.webp" class="d-block w-100" height="400px"
                    alt="Beranda">
                <div class="carousel-caption d-md-block">
                    <p>REPOSITORI</p>
                    <h3>Koleksi karya tugas akhir mahasiswa UKDW seperti skripsi, tesis dan disertasi</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/image/jumbotron/jumbotron3.webp" class="d-block w-100" height="400px"
                    alt="Beranda">
                <div class="carousel-caption d-md-block">
                    <p>OPAC</p>
                    <h3>Katalog koleksi buku terintegrasi dengan lingkup UKDW</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/image/jumbotron/jumbotron4.webp" class="d-block w-100" height="400px"
                    alt="Beranda">
                <div class="carousel-caption d-md-block">
                    <p>SMART LIBRARY</p>
                    <h3>Aplikasi perpustakaan digital yang terafiliasi dengan Gramedia</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHome" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- End Jumbotron -->
</div>
