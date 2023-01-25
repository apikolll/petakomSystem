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
        Schema::create('election', function (Blueprint $table) {
            $table->id();
            $table->blob('profile_img');
            $table->varchar('student_ID');
            $table->varchar('full_name');
            $table->varchar('crt_semester');
            $table->double('crt_result');
            $table->varchar('prv_activities');
            $table->varchar('manifesto');
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
        Schema::dropIfExists('election');
    }
};
