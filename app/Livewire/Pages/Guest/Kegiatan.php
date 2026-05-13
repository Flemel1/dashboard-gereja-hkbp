<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Kegiatan as ModelsKegiatan;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Kegiatan extends Component
{
    public function render()
    {
        return view('livewire.pages.guest.kegiatan', [
            'kegiatans' => ModelsKegiatan::select(['id', 'nama', 'hari', 'jam', 'deskripsi'])->get()
        ]);
    }
}
