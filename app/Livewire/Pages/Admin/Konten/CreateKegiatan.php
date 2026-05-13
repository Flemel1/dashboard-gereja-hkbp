<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Kegiatan;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateKegiatan extends Component
{
    #[Validate([
        'nama' => 'required|string|max:150'
    ], message: [
        'nama.required' => 'nama harus diisi.',
        'nama.string' => 'nama harus berupa teks.',
        'nama.max' => 'nama tidak boleh lebih dari 150 karakter.'
    ])]
    public $nama;

    #[Validate([
        'hari' => 'required|string|max:20'
    ], message: [
        'hari.required' => 'hari harus diisi.',
        'hari.string' => 'hari harus berupa teks.',
        'hari.max' => 'hari tidak boleh lebih dari 20 karakter.'
    ])]
    public $hari;

    #[Validate([
        'jam' => 'required|date_format:H:i'
    ], message: [
        'jam.required' => 'jam harus diisi.',
        'jam.date_format' => 'jam harus berupa waktu.',
    ])]
    public $jam;

    #[Validate([
        'deskripsi' => 'required|string'
    ], message: [
        'deskripsi.required' => 'deskripsi harus diisi.',
        'deskripsi.string' => 'deskripsi harus berupa teks.',
    ])]
    public $deskripsi;

    public function save()
    {

        $this->validate();

        try {
            DB::transaction(function () {

                $kegiatan = new Kegiatan();
                $kegiatan->nama = $this->nama;
                $kegiatan->hari = $this->hari;
                $kegiatan->jam = $this->jam;
                $kegiatan->deskripsi = $this->deskripsi;

                $kegiatan->save();
            });

            $this->dispatch('kegiatan-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses menyimpan data Agenda'
            ]);

            $this->redirectRoute('admin.kegiatan.list');
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('kegiatan-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data agenda'
            ]);
        }
    }
    
    public function render()
    {
        return view('livewire.pages.admin.konten.create-kegiatan');
    }
}
