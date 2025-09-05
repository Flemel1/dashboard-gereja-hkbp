<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Jemaat;
use App\Models\Kematian;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateKematian extends Component
{
    public $jemaat_id;

    #[Validate([
        'tanggal_kematian' => 'required|date'
    ], message: [
        'tanggal_kematian.required' => 'Tanggal Kematian harus diisi.',
        'tanggal_kematian.date' => 'Tanggal Kematian harus berupa tanggal yang valid.'
    ])]
    public $tanggal_kematian;

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


                    $kematian = new Kematian();
                    $kematian->tanggal_kematian = $this->tanggal_kematian;
                    $kematian->nama_jemaat = $this->nama;
                    $kematian->alamat = $this->alamat;
                    $kematian->jenis_kelamin = $this->jenis_kelamin;
                    $kematian->tanggal_lahir = $this->tanggal_lahir;
                    $kematian->no_telepon = $this->no_telepon;

                    $kematian->save();
                });

                $this->dispatch('kematian-saved', [
                    'title' => 'Sukses',
                    'message' => 'Sukses menyimpan data Kematian'
                ]);

                $this->reset();
            } else if ($this->jemaat_id !== '') {
                DB::transaction(function () {
                    $kematian = new Kematian();
                    $kematian->tanggal_kematian = $this->tanggal_kematian;
                    $kematian->jemaat_id = $this->jemaat_id;
                    $kematian->save();
                });

                $this->dispatch('kematian-saved', [
                    'title' => 'Sukses',
                    'message' => 'Sukses menyimpan data Kematian'
                ]);

                $this->reset();
            } else {
                $this->dispatch('kematian-saved', [
                    'title' => 'Error',
                    'message' => 'Pilih Jemaat atau Tambah Jemaat Baru terlebih dahulu.'
                ]);
            }
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('kematian-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data kematian'
            ]);
        }
    }

    public function render()
    {
        $jemaats = Jemaat::pluck('nama', 'id');
        return view('livewire.pages.admin.jemaat.create-kematian', compact('jemaats'));
    }
}
