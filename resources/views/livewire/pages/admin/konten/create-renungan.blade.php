<div class="card">
    <div class="card-header">Tambah Renungan</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-input wire:model="judul" label="Judul" name="judul" type="text" error-key='judul'
                placeholder="Masukkan Judul" />

            <textarea id="editor" label="Deskripsi" name="deskripsi" type="text" placeholder="Masukkan Deskripsi"></textarea>

            @error('deskripsi')
                <span class="text-red">{{ $message }}</span>
            @enderror

            <x-adminlte-input wire:model="tanggal" label="Tanggal" name="tanggal" type="date" error-key='tanggal'
                placeholder="Pilih Tanggal" />

            <input type="file" wire:model="thumbnail">

            @error('thumbnail')
                <span class="error">{{ $message }}</span>
            @enderror

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
                    });

                })
                .catch(error => {
                    console.error(error);
                });

            $wire.on('renungan-saved', (event) => {
                const {
                    title,
                    message
                } = event[0];


                $('#toast-title').text(title);
                $('#toast-message').text(message);
                $('.toast').toast('show');
            });

            $wire.on('update-rich-text', (event) => {
                const judul = @this.get('judul')
                const tanggal = @this.get('tanggal')

                if (data && judul && tanggal) {
                    @this.set('deskripsi', data)
                    $wire.dispatch('save')
                    data = null
                }

                if (!data) {
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            // Update Livewire property on editor change
                            editor.model.document.on('change:data', () => {
                                data = editor.getData()
                            });
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            })
        </script>
    @endscript

    <script></script>
</div>
