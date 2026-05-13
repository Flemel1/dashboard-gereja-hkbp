<div class="card">
    <div class="card-header">Tambah Gallery</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-input wire:model="nama" label="Nama" name="nama" type="text" error-key='nama'
                placeholder="Masukkan Nama Foto" />

            <div class="form-group">
                <label>Upload Foto</label>
                <input type="file" wire:model="foto" class="form-control">
                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if ($foto)
                    <div class="mt-2">
                        <img src="{{ $foto->temporaryUrl() }}" width="200">
                    </div>
                @endif
            </div>

            <x-adminlte-button class="btn-flat" type="submit" label="Simpan" theme="success"
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
