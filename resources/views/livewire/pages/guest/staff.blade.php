<div class="container">
    <!-- staff-hkbp -->
    <section class="staff-hkbp" id="staff-hkbp">
        <div class="row justify-content-center ">
            <h3 class="fw-bold text-center mb-5">Staff HKBP</h3>
            @foreach ($staffs as $item)
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/image/staff/default.png') }}"
                            class="card-img-top" alt="{{ $item->nama }}">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">{{ $item->nama }}</h5>
                            <p>{{ $item->jabatan }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-sm-8 text-center">
                {{ $staffs->links() }}
            </div>
        </div>
    </section>
    <!-- End staff-perpustakaan -->
</div>
