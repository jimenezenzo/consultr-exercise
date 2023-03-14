<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fullName')->nullable();
            $table->unsignedInteger('strength');
            $table->unsignedInteger('speed');
            $table->unsignedInteger('durability');
            $table->unsignedInteger('power');
            $table->unsignedInteger('combat');
            $table->foreignId('race_id')->nullable()->constrained();
            $table->string('height_0');
            $table->string('height_1');
            $table->string('weight_0');
            $table->string('weight_1');
            $table->string('eyeColor');
            $table->string('hairColor');
            $table->foreignId('publisher_id')->constrained();
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
        Schema::dropIfExists('super_heroes');
    }
}
