<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('focus_areas', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('icon')->default('heart');
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('focus_area_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('focus_area_id')->constrained('focus_areas')->cascadeOnDelete();
            $table->string('language_code', 5); // mr, hi, en
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('objectives')->nullable();
            $table->text('activities')->nullable();
            $table->text('impact_summary')->nullable();
            $table->timestamps();

            $table->unique(['focus_area_id', 'language_code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focus_area_translations');
        Schema::dropIfExists('focus_areas');
    }
};
