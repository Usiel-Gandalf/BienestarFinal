<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basics', function (Blueprint $table) {
            $table->id();
            $table->integer('titular_id')->nullable();
            $table->integer('locality_id')->nullable();
            $table->char('consignment', 20)->nullable();
            $table->char('fol_form', 25)->nullable();
            $table->integer('bimester')->nullable();
            $table->date('year')->nullable();
            $table->integer('status')->nullable();
            $table->boolean('type')->nullable();
            //$table->foreign('titular_id')->references('id')->on('titulars')
            //->onUpdate('cascade')
            //->onDelete('set null');
            $table->timestamps();
            $table->foreign('locality_id')->references('id')->on('localities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basics');
    }
}
