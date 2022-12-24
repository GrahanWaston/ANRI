<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_diklat');
            $table->unsignedBigInteger('jenis_id');
            $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
            $table->unsignedBigInteger('jenjang_id');
            $table->foreign('jenjang_id')->references('id')->on('jenjangs')->onDelete('cascade');
            $table->string('nama_diklat');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('tempat_diklat');
            $table->string('biaya');
            $table->string('durasi');
            $table->string('file');
            $table->text('deskripsi');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
