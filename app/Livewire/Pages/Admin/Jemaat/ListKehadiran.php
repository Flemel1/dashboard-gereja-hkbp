<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Kehadiran;
use Livewire\Component;

class ListKehadiran extends Component
{
    private function getDataForDataTable()
    {
        // Fetch all complaints from the database
        $kehadirans = Kehadiran::select(['id', 'tanggal', 'jumlah_hadir', 'tipe_ibadah'])
            ->orderBy('tanggal', 'desc')
            ->get();

        // DataTable configuration
        $config = [];
        // Transform the data into the required format
        $formattedData = $kehadirans->map(function ($kehadiran) {
            // Define action buttons
            // Using Bootstrap button classes for styling
            $btnEdit = '<a href="' . route('admin.kehadiran.edit', $kehadiran->id) . '">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                </a>';

            // Combine buttons into a single string with <nobr> to prevent wrapping
            $actionButtons = '<nobr>' . $btnEdit . '</nobr>';

            // Return the array for a single row
            return [
                $kehadiran->tanggal,
                $kehadiran->jumlah_hadir,
                $kehadiran->tipe_ibadah,
                $actionButtons,
            ];
        });

        $config['data'] = $formattedData;

        return $config;
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.jemaat.list-kehadiran', compact('config'));
    }
}
