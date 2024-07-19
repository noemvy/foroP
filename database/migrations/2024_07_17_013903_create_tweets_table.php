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
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('handle');
            $table->text('tweet');
            $table->string('file')->nullable();
            $table->boolean('is_file')->nullable();
            $table->string('likes')->nullable();
            $table->string('comments')->nullable();
            $table->string('date')->nullable();
            $table->string('tag')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('tweets');
    }
};
