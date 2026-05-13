<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Pernikahan;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListPernikahan extends Component
{
    private function getDataForDataTable()
    {
        // Fetch all complaints from the database
        $jemaats = Pernikahan::select(['id', 'pria_jemaat_id', 'wanita_jemaat_id', 'nama_jemaat_pria', 'nama_jemaat_wanita', 'created_at'])
            ->with(['jemaat_pria', 'jemaat_wanita'])
            ->orderBy('created_at', 'desc')
            ->get();

        // DataTable configuration
        $config = [];

        // Transform the data into the required format
        $formattedData = $jemaats->map(function ($jemaat) {
            // Define action buttons
            // Using Bootstrap button classes for styling
            // $btnDetails = '<a href="' . route('complaint.show', $complaint) . '">
            //         <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Lihat">
            //             <i class="fa fa-lg fa-fw fa-eye"></i>
            //         </button>
            //     </a>';

            $btnDelete = "<button wire:click='delete(\"$jemaat->id\")' class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete'>
                  <i class='fa fa-lg fa-fw fa-trash'></i>
              </button>";

            // Combine buttons into a single string with <nobr> to prevent wrapping
            $actionButtons = '<nobr>' . $btnDelete . '</nobr>';
            $nama_pria = '';
            $nama_wanita = '';

            if ($jemaat->jemaat_pria) {
                $nama_pria = $jemaat->jemaat_pria->nama;
            } else {
                $nama_pria = $jemaat->nama_jemaat_pria;
            }

            if ($jemaat->jemaat_wanita) {
                $nama_wanita = $jemaat->jemaat_wanita->nama;
            } else {
                $nama_wanita = $jemaat->nama_jemaat_wanita;
            }


            // Return the array for a single row
            return [
                $nama_pria,
                $nama_wanita,
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
                $jemaat = Pernikahan::findOrFail($id);
                $jemaat->delete();
            });

            // Optionally, you can add a flash message or emit an event to notify the user
            session()->flash('success', 'Data Berhasil Dihapus');

            redirect()->route('admin.pernikahan.list');
        } catch (Exception $ex) {
            session()->flash('error', 'Data Gagal Dihapus');

            redirect()->route('admin.pernikahan.list');
        }
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.jemaat.list-pernikahan', compact('config'));
    }
}
