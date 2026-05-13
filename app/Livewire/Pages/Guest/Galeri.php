<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Gallery;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.guest')]
class Galeri extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.guest.galeri', [
            'galleries' => Gallery::latest()->paginate(9)
        ]);
    }
}
