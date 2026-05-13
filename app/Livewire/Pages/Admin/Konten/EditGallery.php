<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditGallery extends Component
{
    use WithFileUploads;

    public Gallery $gallery;
    public $nama;
    public $foto;
    public $foto_url;

    public function mount(Gallery $gallery)
    {
        $this->gallery = $gallery;
        $this->nama = $gallery->nama;
        $this->foto_url = $gallery->foto;
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        try {
            DB::transaction(function () {
                $data = [
                    'nama' => $this->nama,
                    'deskripsi' => '-',
                ];

                if ($this->foto) {
                    if ($this->gallery->foto) {
                        Storage::disk('public')->delete($this->gallery->foto);
                    }
                    $fileName = time() . '_' . $this->foto->getClientOriginalName();
                    $data['foto'] = $this->foto->storeAs('gallery', $fileName, 'public');
                }

                $this->gallery->update($data);
            });

            session()->flash('success', 'Data Gallery berhasil diperbarui.');
            return $this->redirectRoute('admin.gallery.list');
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            session()->flash('error', 'Gagal memperbarui data gallery');
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.konten.edit-gallery');
    }
}
