<div class="container">
    <!-- Galeri -->
    <section>
        <div class="row justify-content-center header">
            <div class="col pt-3">
                <h3>Galeri</h3>
                <div class="line"></div>
            </div>
            <div class="container">
                <div class="row row-cols-3">
                    @foreach ($galleries as $item)
                        <div class="col py-3">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid" alt="{{ $item->nama }}"
                                title="{{ $item->nama }}">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-sm-8 text-center">
                    {{ $galleries->links() }}
                </div>
            </div>
    </section>
    <!-- End Galeri -->
</div>
