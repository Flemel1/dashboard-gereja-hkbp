<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Sidi;
use App\Models\Wilayah;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditJemaat extends Component
{
    public Jemaat $jemaat;

    public $wilayah_id;

    #[Validate([
        'nama' => 'required|string|max:100'
    ], message: [
        'nama.required' => 'Nama Jemaat harus diisi.',
        'nama.string' => 'Nama Jemaat harus berupa teks.',
        'nama.max' => 'Nama Jemaat tidak boleh lebih dari 100 karakter.'
    ])]
    public $nama;

    #[Validate([
        'alamat' => 'required|string|max:200'
    ], message: [
        'alamat.required' => 'Alamat Jemaat harus diisi.',
        'alamat.string' => 'Alamat Jemaat harus berupa teks.',
        'alamat.max' => 'Alamat Jemaat tidak boleh lebih dari 100 karakter.'
    ])]
    public $alamat;

    #[Validate([
        'jenis_kelamin' => 'required|in:pria,wanita'
    ], message: [
        'jenis_kelamin.required' => 'Jenis Kelamin Jemaat harus dipilih.',
        'jenis_kelamin.in' => 'Jenis Kelamin Jemaat harus berupa pria atau wanita.'
    ])]
    public $jenis_kelamin;

    #[Validate([
        'tanggal_lahir' => 'required|date'
    ], message: [
        'tanggal_lahir.required' => 'Tanggal Lahir Jemaat harus diisi.',
        'tanggal_lahir.date' => 'Tanggal Lahir Jemaat harus berupa tanggal yang valid.'
    ])]
    public $tanggal_lahir;

    #[Validate([
        'no_telepon' => 'required|string|max:15|regex:/^[0-9]+$/'
    ], message: [
        'no_telepon.required' => 'Nomor Telepon Jemaat harus diisi.',
        'no_telepon.string' => 'Nomor Telepon Jemaat harus berupa teks.',
        'no_telepon.max' => 'Nomor Telepon Jemaat tidak boleh lebih dari 15 karakter.',
        'no_telepon.regex' => 'Nomor Telepon Jemaat harus berupa angka.'
    ])]
    public $no_telepon;

    #[Validate([
        'tanggal_sidi' => 'nullable|date'
    ], message: [
        'tanggal_sidi.date' => 'Tanggal Sidi harus berupa tanggal yang valid.'
    ])]
    public $tanggal_sidi;

    #[Validate([
        'tanggal_baptis' => 'nullable|date'
    ], message: [
        'tanggal_baptis.date' => 'Tanggal Baptis harus berupa tanggal yang valid.'
    ])]
    public $tanggal_baptis;

    public function rules(): array
    {
        return [
            'wilayah_id' => [
                'required',
                'string',
                Rule::in(Wilayah::pluck('id')->toArray()),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'wilayah_id.required' => 'Wilayah harus dipilih',
            'wilayah_id.in' => 'Wilayah yang dipilih tidak ditemukan.'
        ];
    }

    public function mount(Jemaat $jemaat)
    {
        $this->jemaat = $jemaat;

        $baptis = Baptis::where('jemaat_id', $jemaat->id)->first();
        $sidi = Sidi::where('jemaat_id', $jemaat->id)->first();

        $this->nama = $jemaat->nama;
        $this->alamat = $jemaat->alamat;
        $this->jenis_kelamin = $jemaat->jenis_kelamin;
        $this->tanggal_lahir = $jemaat->tanggal_lahir;
        $this->no_telepon = $jemaat->no_telepon;
        $this->wilayah_id = $jemaat->wilayah_id;

        if ($baptis) {
            $this->tanggal_baptis = $baptis->tanggal_baptis;
        }

        if ($sidi) {
            $this->tanggal_sidi = $sidi->tanggal_sidi;
        }
    }

    public function update()
    {
        $this->validate();
      
        try {
            DB::transaction(function () {
                $jemaat = $this->jemaat;
                $jemaat->nama = $this->nama;
                $jemaat->alamat = $this->alamat;
                $jemaat->jenis_kelamin = $this->jenis_kelamin;
                $jemaat->tanggal_lahir = $this->tanggal_lahir;
                $jemaat->no_telepon = $this->no_telepon;
                $jemaat->wilayah_id = $this->wilayah_id;
                $jemaat->save();

                if ($this->tanggal_baptis) {
                    $baptis = Baptis::where('jemaat_id', $jemaat->id)->first();

                    if ($baptis) {
                        $baptis->tanggal_baptis = $this->tanggal_baptis;

                        $baptis->save();
                    } else {
                        $newBaptis = new Baptis();
                        $newBaptis->nama_baptis = "-";
                        $newBaptis->tanggal_baptis = $this->tanggal_baptis;
                        $newBaptis->jemaat_id = $jemaat->id;
                        $newBaptis->save();
                    }
                }

                if ($this->tanggal_sidi) {
                    $sidi = Sidi::where('jemaat_id', $jemaat->id)->first();

                    if ($sidi) {
                        $sidi->tanggal_sidi = $this->tanggal_sidi;

                        $sidi->save();
                    } else {
                        $newSidi = new Sidi();
                        $newSidi->tanggal_sidi = $this->tanggal_sidi;
                        $newSidi->jemaat_id = $jemaat->id;
                        $newSidi->save();
                    }
                }
            });

            $this->dispatch('jemaat-updated', [
                'title' => 'Sukses',
                'message' => 'Data Jemaat berhasil diubah'
            ]);
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('jemaat-updated', [
                'title' => 'Error',
                'message' => 'Gagal mengubah data Jemaat'
            ]);
        }
    }

    public function render()
    {
        $wilayahs = Wilayah::pluck('nama', 'id');
        return view('livewire.pages.admin.jemaat.edit-jemaat', compact('wilayahs'));
    }
}
