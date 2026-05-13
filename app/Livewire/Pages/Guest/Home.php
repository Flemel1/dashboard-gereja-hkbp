<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Agenda;
use App\Models\Gallery;
use App\Models\Renungan;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Home extends Component
{
    public function render()
    {
        $renungans = Renungan::orderBy('id', 'desc')->get();
        $agendas = Agenda::orderBy('id', 'desc')->get();
        $galleries = Gallery::select(['nama', 'foto'])->paginate(8);

        return view('livewire.pages.guest.home', compact('renungans', 'agendas', 'galleries'));
    }
}
