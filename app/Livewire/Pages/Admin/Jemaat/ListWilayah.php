<?php

namespace App\Livewire\Pages\Admin\Jemaat;

use App\Models\Wilayah;
use Livewire\Component;

class ListWilayah extends Component
{
    private function getDataForDataTable()
    {
        // Fetch all complaints from the database
        $wilayahs = Wilayah::select(['id', 'nama','created_at'])
            ->orderBy('created_at', 'desc')
            ->get();

        // DataTable configuration
        $config = [];

        // Transform the data into the required format
        $formattedData = $wilayahs->map(function ($wilayah) {
            // Define action buttons
            // Using Bootstrap button classes for styling
            $btnEdit = '<a href="' . route('admin.wilayah.edit', $wilayah->id) . '">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                </a>';

            // Combine buttons into a single string with <nobr> to prevent wrapping
            $actionButtons = '<nobr>' . $btnEdit . '</nobr>';

            return [
                $wilayah->nama,
                $actionButtons,
            ];
        });

        $config['data'] = $formattedData;

        return $config;
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.jemaat.list-wilayah', compact('config'));
    }
}
