<?php

namespace App\Livewire\Pages\Admin\Konten;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ListGallery extends Component
{
    public function delete($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            if ($gallery->foto) {
                Storage::disk('public')->delete($gallery->foto);
            }
            $gallery->delete();
            session()->flash('success', 'Data Berhasil Dihapus');
        } catch (Exception $ex) {
            session()->flash('error', 'Data Gagal Dihapus');
        }
        return $this->redirectRoute('admin.gallery.list');
    }

    private function getDataForDataTable()
    {
        $galleries = Gallery::select(['id', 'nama', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->get();

        $formattedData = $galleries->map(function ($item) {
            $btnEdit = '<a href="' . route('admin.gallery.edit', $item->id) . '">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                </a>';

            $btnDelete = "<button wire:click='delete(\"$item->id\")' class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete' onclick='return confirm(\"Yakin hapus data?\")'>
                  <i class='fa fa-lg fa-fw fa-trash'></i>
              </button>";

            return [
                $item->nama,
                $item->created_at->format('d M Y'),
                '<nobr>' . $btnEdit . $btnDelete . '</nobr>',
            ];
        });

        return [
            'data' => $formattedData,
            'order' => [[1, 'desc']],
        ];
    }

    public function render()
    {
        $config = $this->getDataForDataTable();
        return view('livewire.pages.admin.konten.list-gallery', compact('config'));
    }
}
