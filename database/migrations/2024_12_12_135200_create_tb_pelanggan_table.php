<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPelangganTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_pelanggan', function (Blueprint $table) {
            $table->id('pel_id'); // Primary key
            $table->unsignedTinyInteger('pel_id_gol'); // Foreign key ke tb_golongan
            $table->unsignedBigInteger('pel_id_user'); // Foreign key ke tb_users
            $table->string('pel_no', 20)->unique();
            $table->string('pel_nama', 50);
            $table->text('pel_alamat');
            $table->string('pel_hp', 20)->nullable();
            $table->string('pel_ktp', 20)->nullable();
            $table->string('pel_seri', 50);
            $table->integer('pel_meteran');
            $table->enum('pel_aktif', ['Y', 'N'])->default('Y');
            $table->timestamps();

            // Relasi dengan tb_golongan
            $table->foreign('pel_id_gol')->references('gol_id')->on('tb_golongan')->onDelete('cascade');

            // Relasi dengan tb_users
            $table->foreign('pel_id_user')->references('user_id')->on('tb_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_pelanggan');
    }
};
