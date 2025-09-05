<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Sidi;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListSidi extends Component
{
    private function getDataForDataTable()
    {
        // Fetch all complaints from the database
        $jemaats = Sidi::select(['id', 'jemaat_id', 'nama_jemaat', 'created_at'])
            ->with(['jemaat'])
            ->orderBy('created_at', 'desc')
            ->get();

        // DataTable configuration
        $config = [];

        // Transform the data into the required format
        $formattedData = $jemaats->map(function ($jemaat) {
            // Define action buttons
            // Using Bootstrap button classes for styling
            $btnSidi = '<a href="' . route('admin.sidi.edit', $jemaat->id) . '">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                </a>';

            $btnDelete = "<button wire:click='delete(\"$jemaat->id\")' class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete'>
                  <i class='fa fa-lg fa-fw fa-trash'></i>
              </button>";

            // Combine buttons into a single string with <nobr> to prevent wrapping
            $actionButtons = '<nobr>' . $btnSidi . $btnDelete . '</nobr>';
            $nama = '';

            if ($jemaat->jemaat) {
                $nama = $jemaat->jemaat->nama;
            } else {
                $nama = $jemaat->nama_jemaat;
            }

            // Return the array for a single row
            return [
                $jemaat->id,
                $nama,
                $actionButtons,
            ];
        });

        $config['data'] = $formattedData;

        return $config;
    }

    public function delete($id)
    {
        try {
            DB::transaction(function () use ($id) {
                // Find the jemaat by ID
                $jemaat = Sidi::findOrFail($id);
                $jemaat->delete();
            });

            // Optionally, you can add a flash message or emit an event to notify the user
            session()->flash('success', 'Data Berhasil Dihapus');

            redirect()->route('admin.sidi.list');
        } catch (Exception $ex) {
            session()->flash('error', 'Data Gagal Dihapus');

            redirect()->route('admin.sidi.list');
        }
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.jemaat.list-sidi', compact('config'));
    }
}
