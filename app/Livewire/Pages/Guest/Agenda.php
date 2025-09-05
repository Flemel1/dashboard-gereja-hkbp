<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Agenda as AgendaModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Agenda extends Component
{
    public $total_page = 0;
    public $current_page = 1;
    public Collection $agendas;

    private $record_per_page = 6;
    private $start = 0;

    public function mount(Request $request)
    {
        $this->current_page = $request->query('page', 1);
        $total_record = AgendaModel::count();
        $this->start = ($this->current_page - 1) * $this->record_per_page;
        $this->total_page = ceil($total_record / $this->record_per_page);
        $this->agendas = AgendaModel::skip($this->start)->take($this->record_per_page)->get();
    }


    public function render()
    {
        return view('livewire.pages.guest.agenda');
    }
}
