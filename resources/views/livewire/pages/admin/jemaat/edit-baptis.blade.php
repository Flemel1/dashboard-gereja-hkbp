<div class="card">
    <div class="card-header">Edit Baptis</div>
    <div class="card-body">
        <form wire:submit.prevent="update">
            <x-adminlte-select wire:model.lazy="jemaat_id" label="Nama Jemaat" name="jemaat_id" error-key='jemaat_id'>
                <option value="">Pilih Jemaat</option>
                @foreach ($jemaats as $id => $name)
                    @if ($loop->first)
                        <option value="new">Tambah Jemaat Baru</option>
                    @endif
                    <option value="{{ $id }}" @if ($id === $jemaat_id) selected @endif>
                        {{ $name }}</option>
                @endforeach

            </x-adminlte-select>

            <x-adminlte-input wire:model.lazy="nama_baptis" label="Nama Baptis" name="nama_baptis" type="text"
                error-key='nama_baptis' placeholder="Masukkan Nama Jemaat" />

            <x-adminlte-input wire:model.lazy="tanggal_baptis" label="Tanggal Baptis" name="tanggal_baptis"
                type="date" error-key='tanggal_baptis' placeholder="Pilih Tanggal Baptis" />


            @if ($jemaat_id === 'new')
                <x-adminlte-input wire:model.lazy="nama" label="Nama Jemaat Baru" name="nama" type="text"
                    error-key='nama' placeholder="Masukkan Nama Jemaat" />

                <x-adminlte-textarea wire:model.lazy="alamat" label="Alamat" name="alamat" error-key='alamat'
                    placeholder="Masukkan Alamat Jemaat" />

                <x-adminlte-select wire:model.lazy="jenis_kelamin" label="Jenis Kelamin" name="jenis_kelamin"
                    error-key='jenis_kelamin'>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="pria">Laki-Laki</option>
                    <option value="wanita">Perempuan</option>
                </x-adminlte-select>

                <x-adminlte-input wire:model.lazy="tanggal_lahir" label="Tanggal Lahir" name="tanggal_lahir"
                    type="date" error-key='tanggal_lahir' placeholder="Pilih Tanggal Lahir" />

                <x-adminlte-input wire:model.lazy="no_telepon" label="No. Telepon" name="no_telepon" type="text"
                    error-key='no_telepon' placeholder="Masukkan No. Telepon Jemaat" />
            @endif

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
            $wire.on('baptis-updated', (event) => {
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
