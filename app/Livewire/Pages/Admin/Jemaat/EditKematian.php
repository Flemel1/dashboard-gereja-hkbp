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

class EditKematian extends Component
{
    public Kematian $kematian;
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

    public function mount(Kematian $kematian)
    {
        $this->kematian = $kematian;

        if ($kematian->jemaat_id) {
            $this->jemaat_id = $kematian->jemaat_id;
        } else {
            $this->jemaat_id = 'new';
        }

        $this->tanggal_kematian = $kematian->tanggal_kematian;
        $this->nama = $kematian->nama_jemaat;
        $this->alamat = $kematian->alamat;
        $this->jenis_kelamin = $kematian->jenis_kelamin;
        $this->tanggal_lahir = $kematian->tanggal_lahir;
        $this->no_telepon = $kematian->no_telepon;
        
    }

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

    public function update()
    {
        $this->validate();

        try {
            if ($this->jemaat_id === 'new') {
                DB::transaction(function () {


                    $kematian = $this->kematian;
                    $kematian->tanggal_kematian = $this->tanggal_kematian;
                    $kematian->nama_jemaat = $this->nama;
                    $kematian->alamat = $this->alamat;
                    $kematian->jenis_kelamin = $this->jenis_kelamin;
                    $kematian->tanggal_lahir = $this->tanggal_lahir;
                    $kematian->no_telepon = $this->no_telepon;
                    $kematian->jemaat_id = null;

                    $kematian->save();
                });

                $this->dispatch('kematian-updated', [
                    'title' => 'Sukses',
                    'message' => 'Sukses mengubah data Kematian'
                ]);

                $this->redirectRoute('admin.kematian.list');
            } else if ($this->jemaat_id !== '') {
                DB::transaction(function () {
                    $kematian = $this->kematian;
                    $kematian->tanggal_kematian = $this->tanggal_kematian;
                    $kematian->jemaat_id = $this->jemaat_id;
                    $kematian->nama_jemaat = null;
                    $kematian->alamat = null;
                    $kematian->jenis_kelamin = null;
                    $kematian->tanggal_lahir = null;
                    $kematian->no_telepon = null;
                    $kematian->save();
                });

                $this->dispatch('kematian-updated', [
                    'title' => 'Sukses',
                    'message' => 'Sukses mengubah data Kematian'
                ]);

                $this->redirectRoute('admin.kematian.list');
            } else {
                $this->dispatch('kematian-updated', [
                    'title' => 'Error',
                    'message' => 'Pilih Jemaat atau Tambah Jemaat Baru terlebih dahulu.'
                ]);
            }
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('kematian-updated', [
                'title' => 'Error',
                'message' => 'Gagal mengubah data kematian'
            ]);
        }
    }

    public function render()
    {
        $jemaats = Jemaat::pluck('nama', 'id');
        return view('livewire.pages.admin.jemaat.edit-kematian', compact('jemaats'));
    }
}
