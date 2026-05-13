<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Renungan;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class RenunganDetail extends Component
{
    public Renungan $renungan;

    public function mount(Renungan $renungan)
    {
        $this->renungan = $renungan;
    }

    public function render()
    {
        return view('livewire.pages.guest.renungan-detail');
    }
}
