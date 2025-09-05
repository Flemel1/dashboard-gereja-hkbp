<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Agenda;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListAgenda extends Component
{
    private function getDataForDataTable()
    {
        // Fetch all complaints from the database
        $agendas = Agenda::select(['id', 'nama', 'tanggal'])
            ->orderBy('id', 'desc')
            ->get();

        // DataTable configuration
        $config = [];

        // Transform the data into the required format
        $formattedData = $agendas->map(function ($agenda) {
            // Define action buttons
            // Using Bootstrap button classes for styling
            $btnEdit = '<a href="' . route('admin.baptis.edit', $agenda->id) . '">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                </a>';

            $btnDelete = "<button wire:click='delete(\"$agenda->id\")' class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete'>
                  <i class='fa fa-lg fa-fw fa-trash'></i>
              </button>";

            // Combine buttons into a single string with <nobr> to prevent wrapping
            $actionButtons = '<nobr>' . $btnEdit . $btnDelete . '</nobr>';


            // Return the array for a single row
            return [
                $agenda->id,
                $agenda->nama,
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
                $agenda = Agenda::findOrFail($id);
                $agenda->delete();
            });

            // Optionally, you can add a flash message or emit an event to notify the user
            session()->flash('success', 'Data Berhasil Dihapus');

            redirect()->route('admin.agenda.list');
        } catch (Exception $ex) {
            session()->flash('error', 'Data Gagal Dihapus');

            redirect()->route('admin.agenda.list');
        }
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.konten.list-agenda', compact('config'));
    }
}
