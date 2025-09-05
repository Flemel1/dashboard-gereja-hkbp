<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Baptis extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'jemaat_id',
        'nama_baptis',
        'tanggal_baptis',
        'nama_jemaat',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_telepon',
    ];

    public function jemaat(): BelongsTo
    {
        return $this->belongsTo(Jemaat::class, 'jemaat_id', 'id');
    }
}
