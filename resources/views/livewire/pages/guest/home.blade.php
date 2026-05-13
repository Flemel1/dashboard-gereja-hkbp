<div class="container">
    <!-- News -->
    <section class="news" id="news">
        <div class="row justify-content-center header">
            <div class="col-sm-6">
                <h3>Renungan</h3>
                <div class="line"></div>
            </div>
            <div class="col-sm-5">
                <div class="text-sm-end">
                    <a href="{{ route('renungan') }}">Lihat Semua Renungan <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <section class="news-section">
            <section class="news" id="news" style="margin-bottom: 40px;">
                <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                            <div class="card mx-auto" style="max-width: 800px;">
                                <a href="{{ route('renungan.detail', $renungans[$i]) }}">
                                    <img src="{{ asset('storage') }}/{{ $renungans[$i]->thumbnail }}"
                                        class="d-block card-img-top" alt="{{ $renungans[$i]->judul }}" width="700"
                                        height="500">
                                </a>
                                <div class="card-body">
                                    <a href="{{ route('renungan.detail', $renungans[$i]) }}"
                                        class="card-title h5 text-decoration-none d-block">
                                        {{ $renungans[$i]->judul }}
                                    </a>
                                    <div class="date d-flex align-items-center mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path stroke="currentColor" stroke-width="1.5"
                                                    d="M2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172C22 6.343 22 8.229 22 12v2c0 3.771 0 5.657-1.172 6.828C19.657 22 17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172C2 19.657 2 17.771 2 14v-2Z" />
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                                    d="M7 4V2.5M17 4V2.5M2.5 9h19" />
                                                <path fill="currentColor"
                                                    d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                                            </g>
                                        </svg>
                                        <span class="ms-2">{{ $renungans[$i]->tanggal }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>

                    <!-- Navigasi Carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel"
                        data-bs-slide="prev">
                        <div class="bg-black">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </div>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel"
                        data-bs-slide="next">
                        <div class="bg-black">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </div>
                    </button>
                </div>
            </section>

        </section>
    </section>
    <!-- End News -->

    <!-- Agenda -->
    <section class="agenda" id="agenda">
        <div class="row justify-content-center header">
            <div class="col-sm-6">
                <h3>Agenda Gereja</h3>
                <div class="line"></div>
            </div>
            <div class="col-sm-5">
                <div class="text-sm-end">
                    <a href="{{ route('agenda') }}">Lihat Semua Agenda <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center body">
            @php
                $today = date('Y-m-d');
                $count = 0;
            @endphp
            @for ($i = 0; $i < 3; $i++)
                <div class="col-sm-4">
                    <div class="card">
                        <img src="{{ asset('storage') }}/{{ $agendas[$i]->thumbnail }}" class="card-img-top"
                            alt="{{ $agendas[$i]->nama }}">
                        <div class="card-body">
                            <a href="{{ route('agenda.detail', $agendas[$i]) }}">{{ $agendas[$i]->nama }}</a>
                            <div class="date mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path stroke="currentColor" stroke-width="1.5"
                                            d="M2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172C22 6.343 22 8.229 22 12v2c0 3.771 0 5.657-1.172 6.828C19.657 22 17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172C2 19.657 2 17.771 2 14v-2Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                            d="M7 4V2.5M17 4V2.5M2.5 9h19" />
                                        <path fill="currentColor"
                                            d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                                    </g>
                                </svg>
                                <span>{{ $agendas[$i]->tanggal }}</span>
                            </div>
                            <div class="time-location mt-2">
                                <span><i class="fa-solid fa-location-dot ms-1 me-3"></i>
                                    {{ $agendas[$i]->lokasi }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </section>
    <!-- End Agenda -->

    <!-- Galeri -->
    <section class="galeri" id="galeri">
        <div class="row justify-content-center header">
            <div class="col-sm-6">
                <h3>Galeri</h3>
                <div class="line"></div>
            </div>
            <div class="col-sm-5">
                <div class="text-sm-end">
                </div>
            </div>
        </div>
        <div class="row justify-content-center body">
            <div class="container text-center my-3">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($galleries as $galery)
                                <div class="carousel-item active">
                                    <div class="col-md-3">
                                        <div class="card me-3">
                                            <div class="card-img">
                                                <img src="{{ asset('storage') }}/{{ $galery->foto }}"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut btn-prev" href="#recipeCarousel"
                            role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut btn-next" href="#recipeCarousel"
                            role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Galeri -->


</div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mediaQuery = window.matchMedia('(min-width: 992px)');

            var handleMediaChange = function(mediaQuery) {
                if (mediaQuery.matches) {
                    var primaryCard = document.querySelector('.news-primary .card');
                    var secondaryCard = document.querySelector('.news-secondary');

                    var maxHeight = secondaryCard.offsetHeight;

                    primaryCard.style.height = maxHeight + 'px';
                    secondaryCard.style.height = maxHeight + 'px';
                }
            };

            handleMediaChange(mediaQuery);

            mediaQuery.addListener(handleMediaChange);
        });

        let items = document.querySelectorAll('#galeri .carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i <= minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script>
@endsection
