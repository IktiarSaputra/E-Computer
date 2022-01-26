<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->unsignedBigInteger('location_id');
            $table->string('procesor');
            $table->string('memory');
            $table->string('harddisk');
            $table->string('vga');
            $table->string('condition');
            $table->string('network');
            $table->string('monitor');
            $table->string('mouse');
            $table->string('keyboard');
            $table->string('type');
            $table->string('image')->nullable();
            $table->text('description');
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
        Schema::dropIfExists('computers');
    }
}
