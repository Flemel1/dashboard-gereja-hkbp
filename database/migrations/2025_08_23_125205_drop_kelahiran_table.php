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

        if (Schema::hasTable('kelahirans')) {
            Schema::drop('kelahirans');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('kelahirans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pria_jemaat_id')->nullable();
            $table->string('nama_jemaat_pria', 100)->nullable();
            $table->string('alamat_pria', 200)->nullable();
            $table->date('tanggal_lahir_pria')->nullable();
            $table->string('no_telepon_pria', 15)->nullable();
            $table->uuid('wanita_jemaat_id')->nullable();
            $table->string('nama_jemaat_wanita', 100)->nullable();
            $table->string('alamat_wanita', 200)->nullable();
            $table->date('tanggal_lahir_wanita')->nullable();
            $table->string('no_telepon_wanita', 15)->nullable();
            $table->string('nama_anak', 100);
            $table->date('tanggal_lahir_anak');
            $table->foreign('pria_jemaat_id')->references('id')->on('jemaats')->onDelete('cascade');
            $table->foreign('wanita_jemaat_id')->references('id')->on('jemaats')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
