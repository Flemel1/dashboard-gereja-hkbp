<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Agenda;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAgenda extends Component
{
    use WithFileUploads;

    #[Validate([
        'nama' => 'required|string|max:100'
    ], message: [
        'nama.required' => 'nama harus diisi.',
        'nama.string' => 'nama harus berupa teks.',
        'nama.max' => 'nama tidak boleh lebih dari 100 karakter.'
    ])]
    public $nama;

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
        'lokasi' => 'required|string'
    ], message: [
        'lokasi.required' => 'lokasi harus diisi.',
        'lokasi.string' => 'lokasi harus berupa teks.',
    ])]
    public $lokasi;

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

                $agenda = new Agenda();
                $agenda->nama = $this->nama;
                $agenda->deskripsi = $this->deskripsi;
                $agenda->lokasi = $this->lokasi;
                $agenda->tanggal = $this->tanggal;

                $fileName = $this->thumbnail->getClientOriginalName();

                $path = $this->thumbnail->storeAs(path: 'thumbnails', name: $fileName, options: 'public');

                $agenda->thumbnail = $path;

                $agenda->save();
            });

            $this->dispatch('agenda-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses menyimpan data Agenda'
            ]);

            $this->redirectRoute('admin.agenda.list');
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('agenda-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data agenda'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.konten.create-agenda');
    }
}
