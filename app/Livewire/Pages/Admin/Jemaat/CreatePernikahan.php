<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Jemaat;
use App\Models\Pernikahan;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePernikahan extends Component
{
    public $pria_jemaat_id;

    public $wanita_jemaat_id;

    #[Validate([
        'tanggal_pernikahan' => 'required|date'
    ], message: [
        'tanggal_pernikahan.required' => 'Tanggal Pernikahan harus diisi.',
        'tanggal_pernikahan.date' => 'Tanggal Pernikahan harus berupa tanggal yang valid.'
    ])]
    public $tanggal_pernikahan;

    // Rules untuk input mempelai pria
    #[Validate([
        'nama_pria' => 'required_if:pria_jemaat_id,new|max:100'
    ], message: [
        'nama_pria.required_if' => 'Nama Jemaat Pria harus diisi.',
        'nama_pria.max' => 'Nama Jemaat Pria tidak boleh lebih dari 100 karakter.'
    ])]
    public $nama_pria;

    #[Validate([
        'alamat_pria' => 'required_if:pria_jemaat_id,new|max:200'
    ], message: [
        'alamat_pria.required_if' => 'Alamat Jemaat Pria harus diisi.',
        'alamat_pria.max' => 'Alamat Jemaat Pria tidak boleh lebih dari 100 karakter.'
    ])]
    public $alamat_pria;

    #[Validate([
        'tanggal_lahir_pria' => 'required_if:pria_jemaat_id,new'
    ], message: [
        'tanggal_lahir_pria.required_if' => 'Tanggal Lahir Jemaat harus diisi.',
    ])]
    public $tanggal_lahir_pria;

    #[Validate([
        'no_telepon_pria' => 'required_if:pria_jemaat_id,new|max:15'
    ], message: [
        'no_telepon_pria.required_if' => 'Nomor Telepon Jemaat harus diisi.',
        'no_telepon_pria.max' => 'Nomor Telepon Jemaat tidak boleh lebih dari 15 karakter.',
    ])]
    public $no_telepon_pria;

    // Rules untuk input mempelai wanita
    #[Validate([
        'nama_wanita' => 'required_if:wanita_jemaat_id,new|max:100'
    ], message: [
        'nama_wanita.required_if' => 'Nama Jemaat Pria harus diisi.',
        'nama_wanita.max' => 'Nama Jemaat Pria tidak boleh lebih dari 100 karakter.'
    ])]
    public $nama_wanita;

    #[Validate([
        'alamat_wanita' => 'required_if:wanita_jemaat_id,new|max:200'
    ], message: [
        'alamat_wanita.required_if' => 'Alamat Jemaat Pria harus diisi.',
        'alamat_wanita.max' => 'Alamat Jemaat Pria tidak boleh lebih dari 100 karakter.'
    ])]
    public $alamat_wanita;

    #[Validate([
        'tanggal_lahir_wanita' => 'required_if:wanita_jemaat_id,new'
    ], message: [
        'tanggal_lahir_wanita.required_if' => 'Tanggal Lahir Jemaat harus diisi.',
    ])]
    public $tanggal_lahir_wanita;

    #[Validate([
        'no_telepon_wanita' => 'required_if:wanita_jemaat_id,new|max:15'
    ], message: [
        'no_telepon_wanita.required_if' => 'Nomor Telepon Jemaat harus diisi.',
        'no_telepon_wanita.max' => 'Nomor Telepon Jemaat tidak boleh lebih dari 15 karakter.',
    ])]
    public $no_telepon_wanita;

    public function rules(): array
    {
        return [
            'pria_jemaat_id' => [
                'required',
                'string',
                Rule::in(array_merge(Jemaat::pluck('id')->toArray(), ['new'])),
            ],
            'wanita_jemaat_id' => [
                'required',
                'string',
                Rule::in(array_merge(Jemaat::pluck('id')->toArray(), ['new'])),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'pria_jemaat_id.required' => 'Jemaat Pria harus dipilih atau Buat Jemaat Baru.',
            'pria_jemaat_id.in' => 'Jemaat Pria yang dipilih tidak ditemukan.',
            'wanita_jemaat_id.required' => 'Jemaat Wanita harus dipilih atau Buat Jemaat Baru.',
            'wanita_jemaat_id.in' => 'Jemaat Wanita yang dipilih tidak ditemukan.'
        ];
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->pria_jemaat_id === 'new' && $this->wanita_jemaat_id === 'new') {
                DB::transaction(function () {


                    $pernikahan = new Pernikahan();
                    $pernikahan->tanggal_pernikahan = $this->tanggal_pernikahan;
                    $pernikahan->nama_jemaat_pria = $this->nama_pria;
                    $pernikahan->alamat_pria = $this->alamat_pria;
                    $pernikahan->tanggal_lahir_pria = $this->tanggal_lahir_pria;
                    $pernikahan->no_telepon_pria = $this->no_telepon_pria;
                    $pernikahan->nama_jemaat_wanita = $this->nama_wanita;
                    $pernikahan->alamat_wanita = $this->alamat_wanita;
                    $pernikahan->tanggal_lahir_wanita = $this->tanggal_lahir_wanita;
                    $pernikahan->no_telepon_wanita = $this->no_telepon_wanita;

                    $pernikahan->save();
                });

                $this->dispatch('pernikahan-saved', [
                    'title' => 'Sukses',
                    'message' => 'Sukses menyimpan data Pernikahan'
                ]);

                $this->reset();
            }  else if ($this->pria_jemaat_id !== 'new' && $this->wanita_jemaat_id !== 'new') {
                DB::transaction(function () {
                    $pernikahan = new Pernikahan();
                    $pernikahan->tanggal_pernikahan = $this->tanggal_pernikahan;
                    $pernikahan->pria_jemaat_id = $this->pria_jemaat_id;
                    $pernikahan->wanita_jemaat_id = $this->wanita_jemaat_id;
                    $pernikahan->save();
                });

                $this->dispatch('pernikahan-saved', [
                    'title' => 'Sukses',
                    'message' => 'Sukses menyimpan data Pernikahan'
                ]);

                $this->reset();
            } else if ($this->pria_jemaat_id !== '' && $this->wanita_jemaat_id === 'new') {
                DB::transaction(function () {
                    $pernikahan = new Pernikahan();
                    $pernikahan->tanggal_pernikahan = $this->tanggal_pernikahan;
                    $pernikahan->pria_jemaat_id = $this->pria_jemaat_id;

                    $pernikahan->nama_jemaat_wanita = $this->nama_wanita;
                    $pernikahan->alamat_wanita = $this->alamat_wanita;
                    $pernikahan->tanggal_lahir_wanita = $this->tanggal_lahir_wanita;
                    $pernikahan->no_telepon_wanita = $this->no_telepon_wanita;
                    $pernikahan->save();
                });

                $this->dispatch('pernikahan-saved', [
                    'title' => 'Sukses',
                    'message' => 'Sukses menyimpan data Pernikahan'
                ]);

                $this->reset();
            } else if ($this->wanita_jemaat_id !== '' && $this->pria_jemaat_id === 'new') {
                DB::transaction(function () {
                    $pernikahan = new Pernikahan();
                    $pernikahan->tanggal_pernikahan = $this->tanggal_pernikahan;
                    $pernikahan->wanita_jemaat_id = $this->wanita_jemaat_id;

                    $pernikahan->nama_jemaat_pria = $this->nama_pria;
                    $pernikahan->alamat_pria = $this->alamat_pria;
                    $pernikahan->tanggal_lahir_pria = $this->tanggal_lahir_pria;
                    $pernikahan->no_telepon_pria = $this->no_telepon_pria;
                    $pernikahan->save();
                });

                $this->dispatch('pernikahan-saved', [
                    'title' => 'Sukses',
                    'message' => 'Sukses menyimpan data Pernikahan'
                ]);

                $this->reset();
            } else {
                $this->dispatch('pernikahan-saved', [
                    'title' => 'Error',
                    'message' => 'Pilih Jemaat atau Tambah Jemaat Baru terlebih dahulu.'
                ]);
            }
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('pernikahan-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data Pernikahan'
            ]);
        }
    }

    public function render()
    {
        $jemaats = Jemaat::pluck('nama', 'id');
        return view('livewire.pages.admin.jemaat.create-pernikahan', compact('jemaats'));
    }
}
