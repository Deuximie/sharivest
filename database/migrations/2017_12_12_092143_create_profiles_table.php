<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->decimal('kodepos', 5, 0)->nullable();
            $table->text('jeniskelamin')->nullable();
            $table->decimal('noktp', 16, 0)->nullable();
            $table->string('namaktp')->nullable();
            $table->string('fotoprofil')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
