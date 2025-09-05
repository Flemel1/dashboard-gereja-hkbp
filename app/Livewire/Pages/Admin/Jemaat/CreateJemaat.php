<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Jemaat;
use Exception;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateJemaat extends Component
{
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

    public function save()
    {
        $this->validate();

        try {
            $jemaat = new Jemaat();
            $jemaat->nama = $this->nama;
            $jemaat->alamat = $this->alamat;
            $jemaat->jenis_kelamin = $this->jenis_kelamin; 
            $jemaat->tanggal_lahir = $this->tanggal_lahir;
            $jemaat->no_telepon = $this->no_telepon;
            $jemaat->save();

            $this->dispatch('jemaat-saved', [
                'title' => 'Sukses',
                'message' => 'Data Jemaat berhasil disimpan'
            ]);
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('jemaat-saved', [
                'title' => 'Error',
                'message' => 'Gagal menyimpan data Jemaat'
            ]);
        }

        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.admin.jemaat.create-jemaat');
    }
}
