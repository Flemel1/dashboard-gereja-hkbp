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

        <div class="row justify-content-center body">
            <div class="col-lg-5 news-primary">
                <div class="card">
                    <a href="#">
                        @php
                            $image = $renungans[0]->thumbnail;
                        @endphp
                        <img src='{{ asset("assets/image/news/$image") }}' class="card-img-top" alt="#">
                    </a>
                    <div class="card-body">
                        <a href="#">
                            {{ $renungans[0]->judul }}
                        </a>
                        <div class="date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none">
                                    <path stroke="currentColor" stroke-width="1.5"
                                        d="M2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172C22 6.343 22 8.229 22 12v2c0 3.771 0 5.657-1.172 6.828C19.657 22 17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172C2 19.657 2 17.771 2 14v-2Z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                        d="M7 4V2.5M17 4V2.5M2.5 9h19" />
                                    <path fill="currentColor"
                                        d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                                </g>
                            </svg>
                            <span>{{ $renungans[0]->tanggal }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 news-secondary">
                @for ($i = 1; $i < 4; $i++)
                    <div class="card @if ($i !== 1) mt-4 @endif">
                        <div class="row g-0">
                            <div class="col-sm-4">
                                <a href="berita/detail-berita-2.php">
                                    <img src="{{ asset('assets/image/news') }}/{{ $renungans[$i]->thumbnail }}" class="img-fluid"
                                        alt="{{ $renungans[$i]->judul }}">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-body">
                                    <a
                                        href="../berita/detail.php?id={{ $renungans[$i]->id }}">{{ $renungans[$i]->judul }}</a>
                                    <div class="date">
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
                                        <span>{{ $renungans[$i]->tanggal }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
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
            @foreach ($agendas as $item)
                @if ($item->tanggal >= $today && $count < 3)
                    <div class="col-sm-4">
                        <div class="card">
                            <img src="#" class="card-img-top" alt="{{ $item->nama }}">
                            <div class="card-body">
                                <a href="{{asset('assets/image/agenda')}}/{{$item->thumbnail}}">{{ $item->nama }}</a>
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
                                    <span>{{ $item->tanggal }}</span>
                                </div>
                                <div class="time-location mt-2">
                                    <span><i class="fa-solid fa-location-dot ms-1 me-3"></i> {{ $item->lokasi }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @if ($count == 0)
                <div class="row justify-content-center ">
                    <ul class="list-unstyled">
                        <li><i class="fa-regular fa-circle-right"></i> Wifi / Internet Access</li>
                    </ul>
                </div>
            @endif
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
                            <div class="carousel-item active">
                                <div class="col-md-3">
                                    <div class="card me-3">
                                        <div class="card-img">
                                            <img src="{{ asset('assets/image/galeri/1.jpeg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card me-3">
                                        <div class="card-img">
                                            <img src="{{ asset('assets/image/galeri/2.jpeg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card me-3">
                                        <div class="card-img">
                                            <img src="{{ asset('assets/image/galeri/3.jpeg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card me-3">
                                        <div class="card-img">
                                            <img src="{{ asset('assets/image/galeri/4.jpeg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card me-3">
                                        <div class="card-img">
                                            <img src="{{ asset('assets/image/galeri/5.jpeg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card me-3">
                                        <div class="card-img">
                                            <img src="{{ asset('assets/image/galeri/6.jpeg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
