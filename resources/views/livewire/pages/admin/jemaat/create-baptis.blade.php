<div class="card">
    <div class="card-header">Tambah Baptis</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-select wire:model.lazy="jemaat_id" label="Nama Jemaat" name="jemaat_id"
                error-key='jemaat_id'>
                <option value="">Pilih Jemaat</option>
                @foreach ($jemaats as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach

            </x-adminlte-select>

            <x-adminlte-input wire:model.lazy="tanggal_baptis" label="Tanggal Baptis" name="tanggal_baptis"
                type="date" error-key='tanggal_baptis' placeholder="Pilih Tanggal Baptis" />

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
            $wire.on('baptis-saved', (event) => {
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
