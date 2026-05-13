<?php

namespace App\Livewire\Pages\Guest;

use App\Models\Staff as StaffModel;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.guest')]
class Staff extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.guest.staff', [
            'staffs' => StaffModel::paginate(6)
        ]);
    }
}
