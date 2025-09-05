<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sidi extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'jemaat_id',
        'tanggal_sidi',
        'nama_jemaat',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_telepon',
    ];

    public function jemaat()
    {
        return $this->belongsTo(Jemaat::class, 'jemaat_id');
    }
}
