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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('reference')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->boolean('confirmed')->nullable();
            $table->string('class')->nullable();
            $table->string('session')->nullable();
            $table->boolean('jss1')->nullable();
            $table->boolean('jss2')->nullable();
            $table->boolean('jss3')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
