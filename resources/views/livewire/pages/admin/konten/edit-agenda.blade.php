<div class="card">
    <div class="card-header">Edit Kegiatan</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-input wire:model="nama" label="Nama" name="nama" type="text" error-key='nama'
                placeholder="Masukkan Nama" />

            <div wire:ignore>
                <textarea id="editor" label="Deskripsi" name="deskripsi" type="text" placeholder="Masukkan Deskripsi">
                    {{ $deskripsi }}
                </textarea>
            </div>

            @error('deskripsi')
                <span class="text-red">{{ $message }}</span>
            @enderror

            <x-adminlte-input wire:model="lokasi" label="Lokasi" name="lokasi" type="text" error-key='lokasi'
                placeholder="Masukkan Lokasi" />

            <x-adminlte-input wire:model="tanggal" label="Tanggal" name="tanggal" type="date" error-key='tanggal'
                placeholder="Pilih Tanggal" />

            <div class="mb-2">
                <input type="file" wire:model="thumbnail">
                @if ($thumbnail_url)
                    <span class="text-primary">Thumbnail Sudah Diupload Sebelumnya</span>
                @endif

                @error('thumbnail')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

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

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    @script
        <script>
            let data = null
            let richTextEl = null

            const el = ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    richTextEl = editor

                    editor.model.document.on('change:data', () => {
                        data = editor.getData()
                        @this.set('deskripsi', data)
                    });

                })
                .catch(error => {
                    console.error(error);
                });

            $wire.on('agenda-saved', (event) => {
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

    <script></script>
</div>
