<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('focus_areas', 'color')) {
            Schema::table('focus_areas', function (Blueprint $table) {
                $table->string('color', 30)->default('green')->after('icon');
            });
        }

        if (!Schema::hasTable('focus_area_initiatives')) {
            Schema::create('focus_area_initiatives', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('focus_area_id');
                $table->integer('order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();

                $table->foreign('focus_area_id', 'fk_fai_fa_id')
                      ->references('id')
                      ->on('focus_areas')
                      ->cascadeOnDelete();
            });
        }

        if (!Schema::hasTable('focus_area_initiative_translations')) {
            Schema::create('focus_area_initiative_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('initiative_id');
                $table->string('language_code', 5); // mr, hi, en
                $table->string('title');
                $table->timestamps();

                $table->foreign('initiative_id', 'fk_fait_init_id')
                      ->references('id')
                      ->on('focus_area_initiatives')
                      ->cascadeOnDelete();

                $table->unique(['initiative_id', 'language_code'], 'fai_trans_lang_unique');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('focus_area_initiative_translations');
        Schema::dropIfExists('focus_area_initiatives');
        if (Schema::hasColumn('focus_areas', 'color')) {
            Schema::table('focus_areas', function (Blueprint $table) {
                $table->dropColumn('color');
            });
        }
    }
};
