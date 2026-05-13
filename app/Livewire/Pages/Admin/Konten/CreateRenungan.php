<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Renungan;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRenungan extends Component
{

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
        'thumbnail' => 'required|image|mimes:jpeg,jpg,png'
    ], message: [
        'thumbnail.required' => 'thumbnail wajib diupload',
        'thumbnail.image' => 'wajib gambar',
        'thumbnail.mimes' => 'wajib png/jpeg/jpg'
    ])]
    public $thumbnail;

    public function save()
    {
        $this->dispatch('update-rich-text');

        $this->validate();

        try {
            DB::transaction(function () {

                $renungan = new Renungan();
                $renungan->judul = $this->judul;
                $renungan->deskripsi = $this->deskripsi;
                $renungan->tanggal = $this->tanggal;

                $fileName = $this->thumbnail->getClientOriginalName();

                $path = $this->thumbnail->storeAs(path: 'thumbnails', name: $fileName, options: 'public');

                $renungan->thumbnail = $path;

                $renungan->save();
            });

            $this->dispatch('renungan-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses menyimpan data Renungan'
            ]);

            $this->redirectRoute('admin.renungan.list');
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            dd($ex->getMessage());
            $this->dispatch('renungan-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data renungan'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.konten.create-renungan');
    }
}
