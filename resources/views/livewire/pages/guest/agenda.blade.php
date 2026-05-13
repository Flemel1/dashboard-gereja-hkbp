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
    <!-- agenda -->
    <section class="my-4" id="agenda">
        <div class="row justify-content-center body">
            <div class="row news-primary mt-4">
                @foreach ($agendas as $agenda)
                    <div class="col-sm-4 mb-5">
                        <div class="card">
                            <img src="{{ asset("storage/$agenda->thumbnail") }}" class="card-img-top"
                                alt="{{ $agenda->nama }}" style="height: 200px;">
                            <div class="card-body">
                                <a href="{{ route('agenda.detail', $agenda) }}">{{ $agenda->nama }}</a>
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
                                    <span>{{ $agenda->tanggal }}</span>
                                </div>
                                <div class="time-location mt-2">
                                    <span><i class="fa-solid fa-location-dot ms-1 me-3"></i> {{ $agenda->lokasi }}
                                    </span>
                                </div>
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
                                    href="{{ route('agenda') }}?page={{ $current_page - 1 }}"><i
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
                                        href="{{ route('agenda') }}?page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $current_page == $total_page ? 'disabled' : '' }}">
                                <a class="page-link page-icon m-2"
                                    href="{{ route('agenda') }}?page={{ $current_page + 1 }}"><i
                                        class="fa-solid fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
