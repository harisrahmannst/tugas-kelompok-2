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
        Schema::create('grademahasiswas', function (Blueprint $table) {
            $table->id();
            $table->integer('nisn');
            $table->string('nama');
            $table->integer('quiz');
            $table->integer('tugas');
            $table->integer('absen');
            $table->integer('praktek');
            $table->integer('uas');
            $table->char('grade');
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
        Schema::dropIfExists('grademahasiswas');
    }
};
