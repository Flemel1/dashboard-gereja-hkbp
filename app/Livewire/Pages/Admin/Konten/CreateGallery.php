<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateGallery extends Component
{
    use WithFileUploads;

    #[Validate([
        'nama' => 'required|string|max:100'
    ], message: ['nama.required' => 'Nama harus diisi.'])]
    public $nama;


    #[Validate([
        'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048'
    ], message: ['foto.required' => 'Foto wajib diupload.'])]
    public $foto;

    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $gallery = new Gallery();
                $gallery->nama = $this->nama;
                $gallery->deskripsi = "-";

                $fileName = time() . '_' . $this->foto->getClientOriginalName();
                $path = $this->foto->storeAs('gallery', $fileName, 'public');
                $gallery->foto = $path;

                $gallery->save();
            });

            session()->flash('success', 'Data Gallery berhasil ditambahkan.');
            return $this->redirectRoute('admin.gallery.list');
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            session()->flash('error', 'Gagal menyimpan data gallery');
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.konten.create-gallery');
    }
}
