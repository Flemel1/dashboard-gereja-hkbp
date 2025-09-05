<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Agenda;
use App\Models\Renungan;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Home extends Component
{
    public function render()
    {
        $renungans = Renungan::all();
        $agendas = Agenda::all();
        return view('livewire.pages.guest.home', compact('renungans', 'agendas'));
    }
}
