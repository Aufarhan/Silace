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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->foreignId('region_id');
            $table->foreignId('status_id')->default((2));
            $table->string('title', 200);
            $table->string('slug')->unique();
            $table->string('images')->nullable();
            $table->text('excerpt', 400);
            $table->text('body', 5000);
            $table->text('lokasi', 200);
            $table->text('komentar', 2000);
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};