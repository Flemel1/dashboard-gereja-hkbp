<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Jemaat;
use App\Models\Sidi;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditSidi extends Component
{
    public Sidi $sidi;
    public $jemaat_id;

    #[Validate([
        'tanggal_sidi' => 'required|date'
    ], message: [
        'tanggal_sidi.required' => 'Tanggal Sidi harus diisi.',
        'tanggal_sidi.date' => 'Tanggal Sidi harus berupa tanggal yang valid.'
    ])]
    public $tanggal_sidi;

    public function mount(Sidi $sidi)
    {
        $this->sidi = $sidi;

        $this->jemaat_id = $sidi->jemaat_id;

        $this->tanggal_sidi = $sidi->tanggal_sidi;
    }

    public function rules(): array
    {
        return [
            'jemaat_id' => [
                'required',
                'string',
                Rule::in(Jemaat::pluck('id')->toArray()),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'jemaat_id.required' => 'Jemaat harus dipilih',
            'jemaat_id.in' => 'Jemaat yang dipilih tidak ditemukan.'
        ];
    }

    public function update()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $sidi = $this->sidi;
                $sidi->tanggal_sidi = $this->tanggal_sidi;
                $sidi->jemaat_id = $this->jemaat_id;
                $sidi->nama_jemaat = null;
                $sidi->alamat = null;
                $sidi->jenis_kelamin = null;
                $sidi->tanggal_lahir = null;
                $sidi->no_telepon = null;
                $sidi->save();
            });

            $this->dispatch('sidi-updated', [
                'title' => 'Sukses',
                'message' => 'Sukses mengubah data Sidi'
            ]);

            $this->redirectRoute('admin.sidi.list');
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('sidi-updated', [
                'title' => 'Error',
                'message' => 'Gagal mengubah data Sidi'
            ]);
        }
    }

    public function render()
    {
        $jemaats = Jemaat::pluck('nama', 'id');
        return view('livewire.pages.admin.jemaat.edit-sidi', compact('jemaats'));
    }
}
