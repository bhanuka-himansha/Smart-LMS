<?php

use App\Enums\QuestionType;
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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->nullable()->references('id')->on('quizzes')->cascadeOnDelete();
            $table->string('question', 256);
            $table->string('type', 256)->default(QuestionType::Multiple);
            $table->json('single')->nullable();
            $table->json('multiple')->nullable();
            $table->json('fill')->nullable();
            $table->json('short')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
