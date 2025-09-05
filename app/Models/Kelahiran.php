<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelahiran extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'pria_jemaat_id',
        'tanggal_lahir_anak',
        'nama_anak',
        'nama_jemaat_pria',
        'alamat_pria',
        'tanggal_lahir_pria',
        'no_telepon_pria',
        'wanita_jemaat_id',
        'nama_jemaat_wanita',
        'alamat_wanita',
        'tanggal_lahir_wanita',
        'no_telepon_wanita',
    ];
}
