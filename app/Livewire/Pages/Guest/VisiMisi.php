<?php

namespace App\Livewire\Pages\Guest;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class VisiMisi extends Component
{
    public function render()
    {
        return view('livewire.pages.guest.visi-misi');
    }
}
