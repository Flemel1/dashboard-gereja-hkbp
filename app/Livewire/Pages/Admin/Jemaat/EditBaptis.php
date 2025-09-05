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

class EditBaptis extends Component
{
    public Baptis $baptis;
    public $jemaat_id;

    #[Validate([
        'nama_baptis' => 'required|string|max:100'
    ], message: [
        'nama_baptis.required' => 'Nama Baptis harus diisi.',
        'nama_baptis.string' => 'Nama Baptis harus berupa teks.',
        'nama_baptis.max' => 'Nama Baptis tidak boleh lebih dari 100 karakter.'
    ])]
    public $nama_baptis;

    #[Validate([
        'tanggal_baptis' => 'required|date'
    ], message: [
        'tanggal_baptis.required' => 'Tanggal Baptis harus diisi.',
        'tanggal_baptis.date' => 'Tanggal Baptis harus berupa tanggal yang valid.'
    ])]
    public $tanggal_baptis;

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

    public function mount(Baptis $baptis)
    {
        $this->baptis = $baptis;
        
        if ($baptis->jemaat_id) {
            $this->jemaat_id = $baptis->jemaat_id;
        } else {
            $this->jemaat_id = 'new';
        }

        $this->nama_baptis = $baptis->nama_baptis;
        $this->tanggal_baptis = $baptis->tanggal_baptis;
        $this->nama = $baptis->nama_jemaat;
        $this->alamat = $baptis->alamat;
        $this->jenis_kelamin = $baptis->jenis_kelamin;
        $this->tanggal_lahir = $baptis->tanggal_lahir;
        $this->no_telepon = $baptis->no_telepon;
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


                    $baptis = $this->baptis;
                    $baptis->nama_baptis = $this->nama_baptis;
                    $baptis->tanggal_baptis = $this->tanggal_baptis;
                    $baptis->nama_jemaat = $this->nama;
                    $baptis->alamat = $this->alamat;
                    $baptis->jenis_kelamin = $this->jenis_kelamin;
                    $baptis->tanggal_lahir = $this->tanggal_lahir;
                    $baptis->no_telepon = $this->no_telepon;
                    $baptis->jemaat_id = null;

                    $baptis->save();
                });

                $this->dispatch('baptis-updated', [
                    'title' => 'Sukses',
                    'message' => 'Sukses menyimpan data Baptis'
                ]);

                $this->redirectRoute('admin.baptis.list');

            } else if ($this->jemaat_id !== '') {
                DB::transaction(function () {
                    $baptis = $this->baptis;
                    $baptis->nama_baptis = $this->nama_baptis;
                    $baptis->tanggal_baptis = $this->tanggal_baptis;
                    $baptis->jemaat_id = $this->jemaat_id;
                    $baptis->nama_jemaat = null;
                    $baptis->alamat = null;
                    $baptis->jenis_kelamin = null;
                    $baptis->tanggal_lahir = null;
                    $baptis->no_telepon = null;
                    $baptis->save();
                });

                $this->dispatch('baptis-updated', [
                    'title' => 'Sukses',
                    'message' => 'Sukses mengubah data Baptis'
                ]);

                $this->redirectRoute('admin.baptis.list');
            } else {
                $this->dispatch('baptis-updated', [
                    'title' => 'Error',
                    'message' => 'Pilih Jemaat atau Tambah Jemaat Baru terlebih dahulu.'
                ]);
            }
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('baptis-updated', [
                'title' => 'Error',
                'message' => 'Gagal mengubah data Baptis'
            ]);
            
        }
    }

    public function render()
    {
        $jemaats = Jemaat::pluck('nama', 'id');
        return view('livewire.pages.admin.jemaat.edit-baptis', compact('jemaats'));
    }
}
