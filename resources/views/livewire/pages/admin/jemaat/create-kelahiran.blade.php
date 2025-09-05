<div class="card">
    <div class="card-header">Tambah Kelahiran</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-select wire:model.lazy="pria_jemaat_id" label="Nama Jemaat Pria (Optional)" name="pria_jemaat_id"
                error-key='pria_jemaat_id'>
                <option value="">Pilih Jemaat</option>
                @foreach ($jemaats as $id => $name)
                    @if ($loop->first)
                        <option value="new">Tambah Jemaat Baru</option>
                    @endif
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach

            </x-adminlte-select>

            <x-adminlte-select wire:model.lazy="wanita_jemaat_id" label="Nama Jemaat Wanita (Optional)"
                name="wanita_jemaat_id" error-key='wanita_jemaat_id'>
                <option value="">Pilih Jemaat</option>
                @foreach ($jemaats as $id => $name)
                    @if ($loop->first)
                        <option value="new">Tambah Jemaat Baru</option>
                    @endif
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach

            </x-adminlte-select>

            <x-adminlte-input wire:model.lazy="nama_anak" label="Nama Anak" name="nama_anak" type="text"
                error-key='nama_anak' placeholder="Masukkan Nama Anak" />

            <x-adminlte-input wire:model.lazy="tanggal_lahir_anak" label="Tanggal Lahir Anak" name="tanggal_lahir_anak"
                type="date" error-key='tanggal_lahir_anak' placeholder="Pilih Tanggal Lahir Anak" />


            {{-- Input Ayah --}}
            @if ($pria_jemaat_id === 'new')
                <x-adminlte-input wire:model.lazy="nama_pria" label="Nama Jemaat Pria Baru" name="nama_pria"
                    type="text" error-key='nama_pria' placeholder="Masukkan Nama Pria Jemaat" />

                <x-adminlte-textarea wire:model.lazy="alamat_pria" label="Alamat Jemaat Pria" name="alamat_pria"
                    error-key='alamat_pria' placeholder="Masukkan Alamat Jemaat Pria" />

                <x-adminlte-input wire:model.lazy="tanggal_lahir_pria" label="Tanggal Lahir Jemaat Pria"
                    name="tanggal_lahir_pria" type="date" error-key='tanggal_lahir_pria'
                    placeholder="Pilih Tanggal Lahir Pria" />

                <x-adminlte-input wire:model.lazy="no_telepon_pria" label="No. Telepon Jemaat Pria"
                    name="no_telepon_pria" type="text" error-key='no_telepon_pria'
                    placeholder="Masukkan No. Telepon Jemaat Pria" />
            @endif

            {{-- Input Ibu --}}
            @if ($wanita_jemaat_id === 'new')
                <x-adminlte-input wire:model.lazy="nama_wanita" label="Nama Jemaat Wanita Baru" name="nama_wanita"
                    type="text" error-key='nama_wanita' placeholder="Masukkan Nama Wanita Jemaat" />

                <x-adminlte-textarea wire:model.lazy="alamat_wanita" label="Alamat Jemaat Wanita" name="alamat_wanita"
                    error-key='alamat_wanita' placeholder="Masukkan Alamat Jemaat Wanita" />

                <x-adminlte-input wire:model.lazy="tanggal_lahir_wanita" label="Tanggal Lahir Jemaat Wanita"
                    name="tanggal_lahir_wanita" type="date" error-key='tanggal_lahir_wanita'
                    placeholder="Pilih Tanggal Lahir Wanita" />

                <x-adminlte-input wire:model.lazy="no_telepon_wanita" label="No. Telepon Jemaat Wanita"
                    name="no_telepon_wanita" type="text" error-key='no_telepon_wanita'
                    placeholder="Masukkan No. Telepon Jemaat Wanita" />
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
            $wire.on('kelahiran-saved', (event) => {
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
