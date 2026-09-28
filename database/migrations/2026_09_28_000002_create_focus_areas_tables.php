<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('focus_areas')) {
            Schema::create('focus_areas', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('icon')->default('heart');
                $table->string('image')->nullable();
                $table->integer('order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('focus_area_translations')) {
            Schema::create('focus_area_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('focus_area_id');
                $table->string('language_code', 5); // mr, hi, en
                $table->string('title');
                $table->text('short_description')->nullable();
                $table->longText('description')->nullable();
                $table->text('objectives')->nullable();
                $table->text('activities')->nullable();
                $table->text('impact_summary')->nullable();
                $table->timestamps();

                $table->foreign('focus_area_id', 'fk_fat_fa_id')
                      ->references('id')
                      ->on('focus_areas')
                      ->cascadeOnDelete();

                $table->unique(['focus_area_id', 'language_code'], 'fa_trans_lang_unique');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('focus_area_translations');
        Schema::dropIfExists('focus_areas');
    }
};
