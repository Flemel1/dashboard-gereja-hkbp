<div class="card">
    <div class="card-header">Tambah Staff</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-input wire:model="nama" label="Nama" name="nama" type="text" error-key='nama'
                placeholder="Masukkan Nama Staff" />

            <x-adminlte-input wire:model="jabatan" label="Jabatan" name="jabatan" type="text" error-key='jabatan'
                placeholder="Masukkan Jabatan" />

            <div class="mb-2">
                <label>Foto Staff</label>
                <input type="file" wire:model="foto" class="form-control">

                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                @if ($foto)
                    <div class="mt-2">
                        <img src="{{ $foto->temporaryUrl() }}" width="150">
                    </div>
                @endif
            </div>

            <x-adminlte-button class="btn-flat" type="submit" label="Simpan" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
    </div>
</div>
