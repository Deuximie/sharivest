<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('category_id')->nullable();
          $table->string('judul')->nullable();
          $table->string('slug')->nullable();
          $table->string('lokasi')->nullable();
          $table->decimal('dana_need', 15, 2)->nullable();
          $table->decimal('profit', 3, 2)->nullable();
          $table->date('mulai_proyek')->nullable();
          $table->date('selesai_proyek')->nullable();
          $table->string('resiko')->nullable();
          $table->string('deskripsi')->nullable();
          $table->string('gambar')->nullable();
          $table->tinyInteger('status')->nullable(); //0:menunggu,1:berhasil,2:gagal
          $table->decimal('dana_collect', 15, 2)->nullable();
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
        Schema::dropIfExists('projects');
    }
}
