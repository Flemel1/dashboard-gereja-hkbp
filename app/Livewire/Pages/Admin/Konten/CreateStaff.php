<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateStaff extends Component
{
    use WithFileUploads;

    public $nama;
    public $jabatan;
    public $foto;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'foto' => 'nullable|image|max:2048',
    ];

    public function save()
    {
        $this->validate();

        $fotoPath = null;
        if ($this->foto) {
            $fotoPath = $this->foto->store('staff-photos', 'public');
        }

        Staff::create([
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'foto' => $fotoPath,
        ]);

        session()->flash('success', 'Data Staff berhasil ditambahkan.');
        return redirect()->route('admin.staff.list');
    }

    public function render()
    {
        return view('livewire.pages.admin.konten.create-staff');
    }
}
