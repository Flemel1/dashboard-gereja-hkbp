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

class CreateSidi extends Component
{
    public $jemaat_id;

    #[Validate([
        'tanggal_sidi' => 'required|date'
    ], message: [
        'tanggal_sidi.required' => 'Tanggal Sidi harus diisi.',
        'tanggal_sidi.date' => 'Tanggal Sidi harus berupa tanggal yang valid.'
    ])]
    public $tanggal_sidi;

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

    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $sidi = new Sidi();
                $sidi->tanggal_sidi = $this->tanggal_sidi;
                $sidi->jemaat_id = $this->jemaat_id;
                $sidi->save();
            });

            $this->dispatch('sidi-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses menyimpan data Sidi'
            ]);
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('sidi-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data Sidi'
            ]);
        }
    }

    public function render()
    {
        $jemaats = Jemaat::pluck('nama', 'id');
        return view('livewire.pages.admin.jemaat.create-sidi', compact('jemaats'));
    }
}
