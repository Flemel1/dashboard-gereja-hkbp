<div class="card">
    <div class="card-header">Tambah Agenda</div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <x-adminlte-input wire:model="nama" label="Nama" name="nama" type="text" error-key='nama'
                placeholder="Masukkan Nama" />

            <x-adminlte-select wire:model.lazy="hari" label="Hari" name="hari"
                error-key='hari'>
                <option value="">Pilih Hari</option>
                <option value="senin">Senin</option>
                <option value="selasa">Selasa</option>
                <option value="rabu">Rabu</option>
                <option value="kamis">Kamis</option>
                <option value="jumat">Jum'at</option>
                <option value="sabtu">Sabtu</option>
                <option value="minggu">Minggu</option>
            </x-adminlte-select>

            <x-adminlte-input wire:model="jam" label="Jam" name="jam" type="time" error-key='jam'
                placeholder="Pilih Jam" />

            <div wire:ignore>
                <textarea id="editor" label="Deskripsi" name="deskripsi" type="text" placeholder="Masukkan Deskripsi"></textarea>
            </div>

            @error('deskripsi')
                <span class="text-red">{{ $message }}</span>
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
                        @this.set('deskripsi', data)
                    });

                })
                .catch(error => {
                    console.error(error);
                });

            $wire.on('kegiatan-saved', (event) => {
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
