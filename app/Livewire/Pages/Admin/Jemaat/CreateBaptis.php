<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Baptis;
use App\Models\Jemaat;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateBaptis extends Component
{

    public $jemaat_id;

    #[Validate([
        'tanggal_baptis' => 'required|date'
    ], message: [
        'tanggal_baptis.required' => 'Tanggal Baptis harus diisi.',
        'tanggal_baptis.date' => 'Tanggal Baptis harus berupa tanggal yang valid.'
    ])]
    public $tanggal_baptis;

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
                $baptis = new Baptis();
                $baptis->nama_baptis = "-";
                $baptis->tanggal_baptis = $this->tanggal_baptis;
                $baptis->jemaat_id = $this->jemaat_id;
                $baptis->save();
            });

            $this->dispatch('baptis-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses menyimpan data Baptis'
            ]);

            $this->reset();
            
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('baptis-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data Baptis'
            ]);
        }
    }

    public function render()
    {
        $jemaats = Jemaat::pluck('nama', 'id');
        return view('livewire.pages.admin.jemaat.create-baptis', compact('jemaats'));
    }
}
