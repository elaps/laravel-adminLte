<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique()->index();
            $table->foreignId('track_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('lessons')->onDelete('set null');
            $table->string('title');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_need_parent')->default(false);
            $table->boolean('is_free')->default(true);
            $table->text('text')->nullable();
            $table->longText('task_text')->nullable();
            $table->tinyInteger('task_type')->nullable();
            $table->longText('task_content')->nullable();
            $table->integer('duration')->nullable();
            $table->json('positions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
