<div class="container">
    <!-- agenda -->
    <section class="agenda" id="agenda">
        <div class="row justify-content-center body">
            @foreach ($agendas as $agend)
                <div class="col-sm-4 mb-5">
                    <div class="card">
                        <img src="{{ asset("storage/$agend->thumbnail") }}" class="card-img-top"
                            alt="{{ $agend->nama }}" style="height: 200px;">
                        <div class="card-body">
                            <a href="#">{{ $agend->nama }}</a>
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
                                <span>{{ $agend->tanggal }}</span>
                            </div>
                            <div class="time-location mt-2">
                                <span><i class="fa-solid fa-location-dot ms-1 me-3"></i> {{ $agend->lokasi }} </span>
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
                        <li class="page-item <?php echo $current_page == 1 ? 'disabled' : ''; ?>">
                            <a class="page-link page-icon m-2" href="{{ route('agenda') }}?page={{ $current_page - 1 }}"><i
                                    class="fa-solid fa-angle-left"></i></a>
                        </li>
                        @for ($i = 1; $i <= $total_page; $i++)
                            <li class="page-item">
                                <a class="page-link m-2 @if ($i == $current_page) active @endif"
                                    href="{{ route('agenda') }}?page={{$i}}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item @if ($current_page == $total_page) disabled @endif">
                            <a class="page-link page-icon m-2" href="{{ route('agenda') }}?page={{ $current_page + 1 }}"><i
                                    class="fa-solid fa-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- End agenda -->
</div>
