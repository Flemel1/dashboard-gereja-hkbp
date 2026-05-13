<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Kegiatan;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListKegiatan extends Component
{
    private function getDataForDataTable()
    {   
        // Fetch all kegiatans from the database
        $kegiatans = Kegiatan::select(['id', 'nama', 'jam', 'hari', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->get();

        // DataTable configuration
        $config = [];

        // Transform the data into the required format
        $formattedData = $kegiatans->map(function ($kegiatan) {
            // Define action buttons
            // Using Bootstrap button classes for styling
            $btnEdit = '<a href="' . route('admin.kegiatan.edit', $kegiatan->id) . '">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                </a>';

            $btnDelete = "<button wire:click='delete(\"$kegiatan->id\")' class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete'>
                  <i class='fa fa-lg fa-fw fa-trash'></i>
              </button>";

            // Combine buttons into a single string with <nobr> to prevent wrapping
            $actionButtons = '<nobr>' . $btnEdit . $btnDelete . '</nobr>';


            // Return the array for a single row
            return [
                $kegiatan->nama,
                $actionButtons,
            ];
        });

        $config['data'] = $formattedData;
        $config['order'] = [[0, 'desc']];

        return $config;
    }

    public function delete($id)
    {
        try {
            DB::transaction(function () use ($id) {
                // Find the jemaat by ID
                $kegiatan = Kegiatan::findOrFail($id);
                $kegiatan->delete();
            });

            // Optionally, you can add a flash message or emit an event to notify the user
            session()->flash('success', 'Data Berhasil Dihapus');

            redirect()->route('admin.kegiatan.list');
        } catch (Exception $ex) {
            session()->flash('error', 'Data Gagal Dihapus');

            redirect()->route('admin.kegiatan.list');
        }
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.konten.list-kegiatan', compact('config'));
    }
}
