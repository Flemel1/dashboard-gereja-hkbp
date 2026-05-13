@php
    function createExcerpt($text, $length)
    {
        if (strlen($text) <= $length) {
            return $text;
        }
        $excerpt = substr($text, 0, $length);
        $lastSpace = strrpos($excerpt, ' ');
        if ($lastSpace !== false) {
            $excerpt = substr($excerpt, 0, $lastSpace);
        }
        return $excerpt . '...';
    }
@endphp

<div class="container">
    <!-- renungan -->
    <section class="my-4" id="renungan">
        <div class="row justify-content-center body">
            <div class="col-lg-11 news-primary">
                @foreach ($renungans as $renungan)
                    <div class="row mb-5">
                        <div class="col-lg-5">
                            <div class="border border-2">
                                <img src="{{ asset("storage/$renungan->thumbnail") }}" width="100%" class="p-4" />
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <a class="text-black fw-bold text-decoration-none" href="{{ route('renungan.detail', $renungan) }}">{{ $renungan->judul }}</a>
                            @php
                                $excerpt = createExcerpt($renungan->deskripsi, 250);
                            @endphp
                            <p class="text-justify mt-3"></p>
                            {!! $excerpt !!}
                            <div class="date mt-4 text-muted">
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
                                <span class="ms-2">{{ $renungan->tanggal }}</span>
                                <p class="mt-3"><i class="fa-solid fa-circle-user me-2"></i> Admin HKBP</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-sm-8 text-center">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $current_page == 1 ? 'disabled' : '' }}">
                                <a class="page-link page-icon m-2"
                                    href="{{ route('renungan') }}?page={{ $current_page - 1 }}"><i
                                        class="fa-solid fa-angle-left"></i></a>
                            </li>
                            @php
                                $start_page = max(1, $current_page - 2);
                                $end_page = min($total_page, $current_page + 2);

                                if ($end_page - $start_page < 4) {
                                    if ($start_page == 1) {
                                        $end_page = min($total_page, $start_page + 4);
                                    } elseif ($end_page == $total_page) {
                                        $start_page = max(1, $end_page - 4);
                                    }
                                }
                            @endphp
                            @for ($i = $start_page; $i <= $end_page; $i++)
                                <li class="page-item">
                                    <a class="page-link m-2 {{ $i == $current_page ? 'active' : '' }}"
                                        href="{{ route('renungan') }}?page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $current_page == $total_page ? 'disabled' : '' }}">
                                <a class="page-link page-icon m-2"
                                    href="{{ route('renungan') }}?page={{ $current_page + 1 }}"><i
                                        class="fa-solid fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
