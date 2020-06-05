<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->primary('id');
            $table->integer('keyLocality');
            $table->string('nameLocality', 100);
            $table->integer('municipality_id')->nullable();
            $table->timestamps();
            $table->foreign('municipality_id')->references('id')->on('municipalities')
            ->onUpdate('cascade')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localities');
    }
}
