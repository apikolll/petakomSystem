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
            $table->bigInteger('user_id');
            $table->string('profile_img');
            $table->string('student_ID');
            $table->string('full_name');
            $table->string('crt_semester');
            $table->double('crt_result');
            $table->string('prv_activities');
            $table->string('manifesto');
            $table->string('status');
            $table->bigInteger('total_vote');
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
