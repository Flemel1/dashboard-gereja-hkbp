<div class="card">
    <div class="card-header">Edit Gallery</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-input wire:model="nama" label="Nama" name="nama" type="text" error-key='nama' />

            <div class="form-group">
                <label>Ganti Foto (Opsional)</label>
                <input type="file" wire:model="foto" class="form-control">

                @if ($foto_url && !$foto)
                    <div class="mt-2">
                        <p class="text-muted">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $foto_url) }}" width="200">
                    </div>
                @endif

                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if ($foto)
                    <div class="mt-2">
                        <p class="text-success">Pratinjau Foto Baru:</p>
                        <img src="{{ $foto->temporaryUrl() }}" width="200">
                    </div>
                @endif
            </div>

            <x-adminlte-button class="btn-flat" type="submit" label="Simpan Perubahan" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    @script
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('deskripsi', editor.getData())
                    });
                });
        </script>
    @endscript
</div>
