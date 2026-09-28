<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('impact_statistics')) {
            Schema::create('impact_statistics', function (Blueprint $table) {
                $table->id();
                $table->integer('number_value')->default(0);
                $table->string('number_prefix')->nullable();
                $table->string('number_suffix')->default('+');
                $table->string('raw_number_display')->nullable(); // e.g. "10,000+"
                $table->string('icon')->default('users');
                $table->integer('order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('impact_statistic_translations')) {
            Schema::create('impact_statistic_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('impact_statistic_id');
                $table->string('language_code', 5);
                $table->string('label');
                $table->text('description')->nullable();
                $table->timestamps();

                $table->foreign('impact_statistic_id', 'fk_ist_stat_id')
                      ->references('id')
                      ->on('impact_statistics')
                      ->cascadeOnDelete();

                // Explicit short index name to adhere to MySQL 64-char identifier limit
                $table->unique(['impact_statistic_id', 'language_code'], 'impact_stat_trans_lang_unique');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('impact_statistic_translations');
        Schema::dropIfExists('impact_statistics');
    }
};
