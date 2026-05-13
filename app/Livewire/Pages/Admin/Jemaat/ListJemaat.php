<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Jemaat;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListJemaat extends Component
{
    private function getDataForDataTable()
    {
        // Fetch all complaints from the database
        $jemaats = Jemaat::select(['id', 'nama', 'created_at', 'wilayah_id'])
            ->with(['wilayah'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        // DataTable configuration
        $config = [];

        // Transform the data into the required format
        $formattedData = $jemaats->map(function ($jemaat) {
            // Define action buttons
            // Using Bootstrap button classes for styling
            $btnEdit = '<a href="' . route('admin.jemaat.edit', $jemaat->id) . '">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                </a>';

            $btnDelete = "<button wire:click='delete(\"$jemaat->id\")' class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete'>
                  <i class='fa fa-lg fa-fw fa-trash'></i>
              </button>";

            // Combine buttons into a single string with <nobr> to prevent wrapping
            $actionButtons = '<nobr>' . $btnEdit . $btnDelete . '</nobr>';

            $namaWilayah = null;

            if ($jemaat->wilayah) {
                $namaWilayah = $jemaat->wilayah->nama;
            }

            // Return the array for a single row
            return [
                $jemaat->nama,
                $namaWilayah,
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
                $jemaat = Jemaat::findOrFail($id);
                $jemaat->delete();
            });

            // Optionally, you can add a flash message or emit an event to notify the user
            session()->flash('success', 'Data Berhasil Dihapus');

            redirect()->route('admin.jemaat.list');
        } catch (Exception $ex) {
            session()->flash('error', 'Data Gagal Dihapus');

            redirect()->route('admin.jemaat.list');
        }
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.jemaat.list-jemaat', compact('config'));
    }
}
