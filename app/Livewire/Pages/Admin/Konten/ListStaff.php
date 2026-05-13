<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Staff;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ListStaff extends Component
{
    public function delete($id)
    {
        $staff = Staff::find($id);
        if ($staff) {
            if ($staff->foto) {
                Storage::disk('public')->delete($staff->foto);
            }
            $staff->delete();
            session()->flash('success', 'Staff berhasil dihapus.');
        }
    }

    private function getDataForDataTable()
    {
        // Fetch all complaints from the database
        $staffs = Staff::select(['id', 'nama', 'jabatan', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->get();

        // DataTable configuration
        $config = [];

        // Transform the data into the required format
        $formattedData = $staffs->map(function ($staff) {
            // Define action buttons
            // Using Bootstrap button classes for styling
            $btnEdit = '<a href="' . route('admin.staff.edit', $staff->id) . '">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                </a>';

            $btnDelete = "<button wire:click='delete(\"$staff->id\")' class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete'>
                  <i class='fa fa-lg fa-fw fa-trash'></i>
              </button>";

            // Combine buttons into a single string with <nobr> to prevent wrapping
            $actionButtons = '<nobr>' . $btnEdit . $btnDelete . '</nobr>';


            // Return the array for a single row
            return [
                $staff->nama,
                $staff->jabatan,
                $actionButtons,
            ];
        });

        $config['data'] = $formattedData;
        $config['order'] = [[0, 'desc']];

        return $config;
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.konten.list-staff', compact('config'));
    }
}
