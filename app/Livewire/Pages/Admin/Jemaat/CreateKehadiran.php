<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Enums\TipeIbadah;
use App\Models\Kehadiran;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use PDOException;

class CreateKehadiran extends Component
{
    #[Validate(rule: 'required|date_format:Y-m-d', message: 'Tanggal harus diisi dengan format YYYY-MM-DD.')]
    public $tanggal;
    #[Validate(rule: 'required|integer|min:0', message: 'Jumlah Hadir harus diisi dengan angka yang valid.')]
    public $jumlah_hadir;

    public $tipe_ibadah;

    public function rules(): array
    {
        return [
            'tipe_ibadah' => [
                'required',
                'string',
                Rule::in(array_column(TipeIbadah::cases(), 'value')),
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'tipe_ibadah.required' => 'Tipe Ibadah harus diisi.',
            'tipe_ibadah.in' => 'Tipe Ibadah harus diisi dengan tipe yang valid.',
        ];
    }

    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $kehadiran = new Kehadiran();
                $kehadiran->tanggal = $this->tanggal;
                $kehadiran->jumlah_hadir = $this->jumlah_hadir;
                $kehadiran->tipe_ibadah = $this->tipe_ibadah;


                $kehadiran->save();
            });

            $this->dispatch('kehadiran-saved', [
                'title' => 'Sukses',
                'message' => 'Sukses menyimpan data kehadiran'
            ]);


            $this->reset();
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (PDOException $ex) {
            if ($ex->getCode() === '23000') {
                $this->dispatch('kehadiran-saved', [
                    'title' => 'Error',
                    'message' => 'Data kehadiran dengan tanggal dan tipe ibadah yang sama sudah ada.'
                ]);
            } else {
                $this->dispatch('kehadiran-saved', [
                    'title' => 'Error',
                    'message' => 'Terjadi kesalahan saat menyimpan data ke database'
                ]);
            }
        } catch (Exception $ex) {
            $this->dispatch('kehadiran-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data kehadiran'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.jemaat.create-kehadiran');
    }
}
