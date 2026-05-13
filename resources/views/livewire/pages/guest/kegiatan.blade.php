<div class="container">
    <!-- books -->
    <section class="books" id="books">
        <div class="row justify-content-center">
            <h3 class="fw-bold text-center mb-4">Agenda HKBP Klaten</h3>
            <div class="col-lg-11">

                <ul>
                    @foreach ($kegiatans as $kegiatan)
                        <li><a class="text-black fw-bold text-decoration-none" href="{{ route('kegiatan.detail', $kegiatan) }}">{{ $kegiatan->nama }} : {{ $kegiatan->hari }}, {{ $kegiatan->jam }} WIB</a></li>
                    @endforeach
                </ul>

            </div>
        </div>
    </section>
    <!-- End books -->
</div>
