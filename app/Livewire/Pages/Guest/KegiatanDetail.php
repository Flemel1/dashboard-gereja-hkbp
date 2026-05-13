<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Kegiatan;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class KegiatanDetail extends Component
{
    public Kegiatan $kegiatan;

    public function mount(Kegiatan $kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        return view('livewire.pages.guest.kegiatan-detail');
    }
}
