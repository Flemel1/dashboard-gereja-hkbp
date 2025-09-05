<?php

namespace App\Models;

use App\Enums\TipeIbadah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kehadiran extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'tanggal',
        'jumlah_hadir',
        'tipe_ibadah',
    ];

    protected $casts = [
        'tipe_ibadah' => TipeIbadah::class,
    ];
}
