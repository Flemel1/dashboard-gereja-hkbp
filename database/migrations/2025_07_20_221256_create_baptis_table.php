<?php

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
        Schema::create('baptis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('jemaat_id')->nullable();
            $table->string('nama_jemaat', 100)->nullable();
            $table->string('alamat', 200)->nullable();
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_telepon', 15)->nullable();
            $table->string('nama_baptis', 100);
            $table->date('tanggal_baptis');
            $table->foreign('jemaat_id')->references('id')->on('jemaats')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baptis');
    }
};
