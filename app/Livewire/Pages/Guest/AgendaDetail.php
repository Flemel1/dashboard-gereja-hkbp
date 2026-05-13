<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Agenda;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class AgendaDetail extends Component
{
    public Agenda $agenda;

    public function mount(Agenda $agenda)
    {
        $this->agenda = $agenda;
    }

    public function render()
    {
        return view('livewire.pages.guest.agenda-detail');
    }
}
