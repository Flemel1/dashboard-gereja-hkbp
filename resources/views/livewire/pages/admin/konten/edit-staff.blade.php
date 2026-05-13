<div class="card">
    <div class="card-header">Edit Staff</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-input wire:model="nama" label="Nama" name="nama" type="text" error-key='nama'
                placeholder="Masukkan Nama Staff" />

            <x-adminlte-input wire:model="jabatan" label="Jabatan" name="jabatan" type="text" error-key='jabatan'
                placeholder="Masukkan Jabatan" />

            <div class="mb-2">
                <label>Foto Staff</label>
                <input type="file" wire:model="foto" class="form-control">

                @if ($foto_url && !$foto)
                    <div class="mt-2 text-primary">Foto saat ini:</div>
                    <img src="{{ asset('storage/' . $foto_url) }}" width="150" class="mb-2">
                @endif

                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                @if ($foto)
                    <div class="mt-2 text-success">Pratinjau Foto Baru:</div>
                    <img src="{{ $foto->temporaryUrl() }}" width="150">
                @endif
            </div>

            <x-adminlte-button class="btn-flat" type="submit" label="Simpan Perubahan" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
    </div>
</div>
