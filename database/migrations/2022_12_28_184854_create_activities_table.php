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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('organizer_name');
            $table->string('name');
            $table->date('startdate');
            $table->date('enddate');
            $table->time('time');
            $table->string('venue');
            $table->string('HOSD')->nullable();
            $table->string('Coordinator')->nullable();
            $table->string('Dean')->nullable();
            $table->string('description');
            $table->string('objective');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
