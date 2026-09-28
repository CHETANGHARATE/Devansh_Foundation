<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('reports')) {
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
        }

        if (!Schema::hasTable('report_translations')) {
            Schema::create('report_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('report_id');
                $table->string('language_code', 5);
                $table->string('title');
                $table->text('description')->nullable();
                $table->timestamps();

                $table->foreign('report_id', 'fk_rt_report_id')
                      ->references('id')
                      ->on('reports')
                      ->cascadeOnDelete();

                $table->unique(['report_id', 'language_code'], 'report_trans_lang_unique');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('report_translations');
        Schema::dropIfExists('reports');
    }
};
