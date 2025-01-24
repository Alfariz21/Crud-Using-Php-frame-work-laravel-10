<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbGolonganTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_golongan', function (Blueprint $table) {
            $table->tinyIncrements('gol_id'); // Primary key
            $table->string('gol_kode', 10)->unique(); // Kode golongan
            $table->string('gol_nama', 50); // Nama golongan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_golongan'); // Hapus tabel jika rollback
    }
};