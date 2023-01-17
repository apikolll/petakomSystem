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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('ReportCreator_name');
            $table->string('Report_Title');
            $table->date('Report_date');
            $table->string('statusbyHOSD')->nullable();
            $table->string('statusbyCoordinator')->nullable();
            $table->string('statusbyDean')->nullable();
            $table->string('Report_description');
            $table->string('Report_objective');
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
        Schema::dropIfExists('reports');
    }
};
