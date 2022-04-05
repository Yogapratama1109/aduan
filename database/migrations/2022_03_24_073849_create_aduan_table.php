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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->string('no_telp', 20);
            $table->string('isi', 255);
            $table->string('image', 100);
            $table->enum('status', [1,2,3])->comment('1 = new', '2 = accept', '3 = decline')->default(1);
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->foreign('petugas_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('aduan');
    }
};
