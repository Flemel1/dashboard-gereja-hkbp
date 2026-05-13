<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Wilayah;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditWilayah extends Component
{
    public Wilayah $wilayah;

    #[Validate([
        'nama' => 'required|max:150'
    ], message: [
        'nama.required' => 'Nama Jemaat harus diisi.',
        'nama.max' => 'Nama Jemaat tidak boleh lebih dari 150 karakter.'
    ])]
    public $nama;

    public function mount(Wilayah $wilayah)
    {
        $this->wilayah = $wilayah;
        $this->nama = $wilayah->nama;
    }

    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $wilayah = $this->wilayah;

                $wilayah->nama = $this->nama;

                $wilayah->save();
            });

            $this->dispatch('wilayah-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses mengubah data Wilayah'
            ]);
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('wilayah-saved', [
                'title' => 'Error',
                'message' => 'Gagal mengubah data Wilayah'
            ]);
        }
    }

    
    public function render()
    {
        return view('livewire.pages.admin.jemaat.edit-wilayah');
    }
}
