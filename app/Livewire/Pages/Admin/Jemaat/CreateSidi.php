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

    #[Validate([
        'nama' => 'required_if:jemaat_id,new|max:100'
    ], message: [
        'nama.required_if' => 'Nama Jemaat harus diisi.',
        'nama.max' => 'Nama Jemaat tidak boleh lebih dari 100 karakter.'
    ])]
    public $nama;

    #[Validate([
        'alamat' => 'required_if:jemaat_id,new|max:200'
    ], message: [
        'alamat.required_if' => 'Alamat Jemaat harus diisi.',
        'alamat.max' => 'Alamat Jemaat tidak boleh lebih dari 100 karakter.'
    ])]
    public $alamat;

    #[Validate([
        'jenis_kelamin' => 'required_if:jemaat_id,new'
    ], message: [
        'jenis_kelamin.required_if' => 'Jenis Kelamin Jemaat harus dipilih.',
    ])]
    public $jenis_kelamin;

    #[Validate([
        'tanggal_lahir' => 'required_if:jemaat_id,new'
    ], message: [
        'tanggal_lahir.required_if' => 'Tanggal Lahir Jemaat harus diisi.',
    ])]
    public $tanggal_lahir;

    #[Validate([
        'no_telepon' => 'required_if:jemaat_id,new|max:15'
    ], message: [
        'no_telepon.required_if' => 'Nomor Telepon Jemaat harus diisi.',
        'no_telepon.max' => 'Nomor Telepon Jemaat tidak boleh lebih dari 15 karakter.',
    ])]
    public $no_telepon;

    public function rules(): array
    {
        return [
            'jemaat_id' => [
                'required',
                'string',
                Rule::in(array_merge(Jemaat::pluck('id')->toArray(), ['new'])),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'jemaat_id.required' => 'Jemaat harus dipilih atau Buat Jemaat Baru.',
            'jemaat_id.in' => 'Jemaat yang dipilih tidak ditemukan.'
        ];
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->jemaat_id === 'new') {
                DB::transaction(function () {


                    $sidi = new Sidi();
                    $sidi->tanggal_sidi = $this->tanggal_sidi;
                    $sidi->nama_jemaat = $this->nama;
                    $sidi->alamat = $this->alamat;
                    $sidi->jenis_kelamin = $this->jenis_kelamin;
                    $sidi->tanggal_lahir = $this->tanggal_lahir;
                    $sidi->no_telepon = $this->no_telepon;

                    $sidi->save();
                });

                $this->dispatch('sidi-saved', [
                    'title' => 'Sukses',
                    'message' => 'Sukses menyimpan data Sidi'
                ]);

                $this->reset();
            } else if ($this->jemaat_id !== '') {
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

                $this->reset();
            } else {
                $this->dispatch('sidi-saved', [
                    'title' => 'Error',
                    'message' => 'Pilih Jemaat atau Tambah Jemaat Baru terlebih dahulu.'
                ]);
            }
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
