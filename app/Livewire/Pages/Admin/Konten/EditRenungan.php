<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Renungan;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditRenungan extends Component
{
    public Renungan $renungan;

    use WithFileUploads;

    #[Validate([
        'judul' => 'required|string|max:100'
    ], message: [
        'judul.required' => 'judul harus diisi.',
        'judul.string' => 'judul harus berupa teks.',
        'judul.max' => 'judul tidak boleh lebih dari 100 karakter.'
    ])]
    public $judul;

    #[Validate([
        'tanggal' => 'required|date'
    ], message: [
        'tanggal.required' => 'Tanggal harus diisi.',
        'tanggal.date' => 'Tanggal harus berupa tanggal yang valid.'
    ])]
    public $tanggal;

    #[Validate([
        'deskripsi' => 'required|string'
    ], message: [
        'deskripsi.required' => 'deskripsi harus diisi.',
        'deskripsi.string' => 'deskripsi harus berupa teks.',
    ])]
    public $deskripsi;

    #[Validate([
        'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png'
    ], message: [
        'thumbnail.image' => 'wajib gambar',
        'thumbnail.mimes' => 'wajib png/jpeg/jpg'
    ])]
    public $thumbnail;

    public $thumbnail_url;

    public function mount(Renungan $renungan)
    {
        $this->renungan = $renungan;
        $this->judul = $renungan->judul;
        $this->tanggal = $renungan->tanggal;
        $this->deskripsi = $renungan->deskripsi;
        $this->thumbnail_url = $renungan->thumbnail;
    }

    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {

                $renungan = $this->renungan;
                $renungan->judul = $this->judul;
                $renungan->deskripsi = $this->deskripsi;
                $renungan->tanggal = $this->tanggal;

                if ($this->thumbnail) {
                    $fileName = $this->thumbnail->getClientOriginalName();

                    $path = $this->thumbnail->storeAs(path: 'thumbnails', name: $fileName, options: 'public');

                    $renungan->thumbnail = $path;
                }

                $renungan->save();
            });

            $this->dispatch('renungan-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses mengubah data Renungan'
            ]);

            $this->redirectRoute('admin.renungan.list');
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            dd($ex->getMessage());
            $this->dispatch('renungan-saved', [
                'title' => 'Error',
                'message' => 'Gagal mengubah data renungan'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.konten.edit-renungan');
    }
}
