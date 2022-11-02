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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('dob');
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('religion')->nullable();
            $table->string('documents')->nullable();
            $table->string('profilePics')->nullable();
            $table->string('class')->nullable();
            $table->string('extraCurriculumActivities')->nullable();
            $table->string('house')->nullable();
            $table->string('prefect')->nullable();
            $table->string('extraActivitiesPrefect')->nullable();
            $table->string('session')->nullable();
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
        Schema::dropIfExists('students');
    }
};
