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
                                <li><a class="dropdown-item" href="{{ route('staff') }}">Staff HKBP</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-list-ul"></i> KOLEKSI
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('renungan') }}">Renungan</a></li>
                                <li><a class="dropdown-item" href="{{ route('agenda') }}">Kegiatan</a></li>
                                <li><a class="dropdown-item" href="{{ route('kegiatan') }}">Agenda</a></li>
                                <li><a class="dropdown-item" href="{{ route('galeri') }}">Galeri</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">ADMIN</a>
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
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/image/jumbotron/1620572774.jpeg') }}" class="d-block w-100" height="400px"
                    alt="Beranda">
                <div class="carousel-caption d-md-block">
                    <p>HKBP</p>
                    <h3>Klaten</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jumbotron -->
</div>
