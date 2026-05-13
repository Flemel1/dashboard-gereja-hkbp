<div class="container">
    <!-- news -->
    <section class="news" id="news">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3 class="fw-bold mt-4">{{ $kegiatan->nama }}</h3>
                <div class="date mt-4 mb-4 text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                        <g fill="none">
                            <path stroke="currentColor" stroke-width="1.5"
                                d="M2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172C22 6.343 22 8.229 22 12v2c0 3.771 0 5.657-1.172 6.828C19.657 22 17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172C2 19.657 2 17.771 2 14v-2Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                d="M7 4V2.5M17 4V2.5M2.5 9h19" />
                            <path fill="currentColor"
                                d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                        </g>
                    </svg>
                    <span>{{ $kegiatan->hari }}, {{ $kegiatan->jam }} WIB</span>
                </div>
                <div class="col-12">
                    {!! $kegiatan->deskripsi !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End news -->
</div>
