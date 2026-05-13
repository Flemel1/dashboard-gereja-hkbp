<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Wilayah;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateWilayah extends Component
{
    #[Validate([
        'nama' => 'required|max:150'
    ], message: [
        'nama.required' => 'Nama Jemaat harus diisi.',
        'nama.max' => 'Nama Jemaat tidak boleh lebih dari 150 karakter.'
    ])]
    public $nama;

    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $wilayah = new Wilayah();

                $wilayah->nama = $this->nama;

                $wilayah->save();
            });

            $this->dispatch('wilayah-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses menyimpan data Wilayah'
            ]);

            $this->reset();
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('wilayah-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data Wilayah'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.jemaat.create-wilayah');
    }
}
