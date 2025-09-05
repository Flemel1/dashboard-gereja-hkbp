<?php

use App\Enums\TipeIbadah;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $tipe_ibadah = array_column(TipeIbadah::cases(), 'value');
            $table->date('tanggal');
            $table->integer('jumlah_hadir');
            $table->enum('tipe_ibadah', $tipe_ibadah);
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['tanggal', 'tipe_ibadah'], 'kehadirans_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
