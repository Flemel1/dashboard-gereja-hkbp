<?php

namespace App\Livewire\Pages\Guest;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Sejarah extends Component
{
    public function render()
    {
        return view('livewire.pages.guest.sejarah');
    }
}
