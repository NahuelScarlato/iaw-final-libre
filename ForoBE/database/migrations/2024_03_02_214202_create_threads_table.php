<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('tags');
            $table->text('text');
            $table->json('images');
            $table->json('likes');
            $table->json('dislikes');
            $table->json('comments');
            $table->boolean('closed')->default(0);
            $table->unsignedBigInteger('author');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
