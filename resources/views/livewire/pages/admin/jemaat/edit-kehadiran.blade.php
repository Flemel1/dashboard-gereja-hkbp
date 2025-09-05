@php
    use App\Enums\TipeIbadah;
    $tipe_ibadah = array_column(TipeIbadah::cases(), 'value');
@endphp

<div class="card">
    <div class="card-header">Edit Kehadiran</div>
    <div class="card-body">
        <form wire:submit.prevent="update">
            <x-adminlte-select wire:model.lazy="tipe_ibadah" label="Kategori Ibadah" name="tipe_ibadah"
                error-key='tipe_ibadah'>
                <option value="">Pilih</option>
                @foreach ($tipe_ibadah as $tipe)
                    <option value="{{ $tipe }}">{{ $tipe }}</option>
                @endforeach

            </x-adminlte-select>

            <x-adminlte-input wire:model.lazy="tanggal" label="tanggal" name="tanggal" type="date"
                error-key='tanggal' placeholder="Masukkan Tanggal" />

            <x-adminlte-input wire:model.lazy="jumlah_hadir" label="Jumlah Jemaat Hadir" name="jumlah_hadir" type="text"
                error-key='jumlah_hadir' placeholder="Masukkan Jumlah Jemaat Hadir" />

            <x-adminlte-button class="btn-flat" type="submit" label="Simpan" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
    </div>

    <div wire:ignore style="position: absolute; top: 0; right: 0; width: 300px;" class="toast" role="alert"
        aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-header">
            <strong id="toast-title" class="mr-auto"></strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <span id="toast-message"></span>
        </div>
    </div>

    @script
        <script>
            $wire.on('kehadiran-saved', (event) => {
                const {
                    title,
                    message
                } = event[0];


                $('#toast-title').text(title);
                $('#toast-message').text(message);
                $('.toast').toast('show');
            });
        </script>
    @endscript
</div>
