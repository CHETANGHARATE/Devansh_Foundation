<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('annual'); // annual, financial, activity, impact
            $table->string('year'); // e.g. '2024-2025'
            $table->string('file_path')->nullable();
            $table->string('file_size')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('report_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->cascadeOnDelete();
            $table->string('language_code', 5);
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique(['report_id', 'language_code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_translations');
        Schema::dropIfExists('reports');
    }
};
