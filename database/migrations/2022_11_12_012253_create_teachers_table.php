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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('dob')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->string('documents')->nullable();
            $table->string('profilePics')->nullable();
            $table->string('formClass')->nullable();
            $table->string('extraCurriculumActivities')->nullable();
            $table->string('department')->nullable();
            $table->string('house')->nullable();
            $table->boolean('hod')->nullable();
            $table->string('session')->nullable();
            $table->boolean('complete')->default(0);
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
        Schema::dropIfExists('teachers');
    }
};
