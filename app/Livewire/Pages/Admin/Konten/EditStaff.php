<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditStaff extends Component
{
    use WithFileUploads;

    public $staffId;
    public $nama;
    public $jabatan;
    public $foto;
    public $foto_url;

    public function mount(Staff $staff)
    {
        $this->staffId = $staff->id;
        $this->nama = $staff->nama;
        $this->jabatan = $staff->jabatan;
        $this->foto_url = $staff->foto;
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $staff = Staff::find($this->staffId);

        $data = [
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
        ];

        if ($this->foto) {
            if ($staff->foto) {
                Storage::disk('public')->delete($staff->foto);
            }
            $data['foto'] = $this->foto->store('staff-photos', 'public');
        }

        $staff->update($data);

        session()->flash('success', 'Data Staff berhasil diperbarui.');
        return redirect()->route('admin.staff.list');
    }

    public function render()
    {
        return view('livewire.pages.admin.konten.edit-staff');
    }
}
