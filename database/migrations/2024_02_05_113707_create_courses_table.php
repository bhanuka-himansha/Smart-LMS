<?php

use App\Enums\CourseType;
use App\Enums\Currency;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('slug', 256)->unique();
            $table->string('category', 256);
            $table->string('color', 256);
            $table->longText('description');
            $table->json('thumbnails')->nullable();
            $table->json('video')->nullable();
            $table->json('objectives')->nullable();
            $table->string('type')->default(CourseType::Free);
            $table->decimal('amount')->default(0);
            $table->decimal('discount')->default(0);
            $table->string('currency')->default(Currency::SriLankanRupee);
            $table->boolean('status')->default(2);
            $table->longText('certificate')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
