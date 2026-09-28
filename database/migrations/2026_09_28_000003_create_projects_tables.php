<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('focus_area_id')->nullable();
                $table->string('slug')->unique();
                $table->string('featured_image')->nullable();
                $table->string('location')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->string('beneficiaries_count')->nullable(); // e.g. "1,200+ Students" or "500 Families"
                $table->decimal('target_amount', 12, 2)->nullable();
                $table->decimal('raised_amount', 12, 2)->default(0);
                $table->string('status')->default('ongoing'); // ongoing, completed, upcoming
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_published')->default(true);
                $table->integer('order')->default(0);
                $table->timestamps();

                $table->foreign('focus_area_id', 'fk_proj_fa_id')
                      ->references('id')
                      ->on('focus_areas')
                      ->nullOnDelete();
            });
        }

        if (!Schema::hasTable('project_translations')) {
            Schema::create('project_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id');
                $table->string('language_code', 5);
                $table->string('title');
                $table->text('short_description')->nullable();
                $table->longText('description')->nullable();
                $table->text('problem_statement')->nullable();
                $table->text('solution')->nullable();
                $table->text('activities')->nullable();
                $table->text('impact_text')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->timestamps();

                $table->foreign('project_id', 'fk_pt_proj_id')
                      ->references('id')
                      ->on('projects')
                      ->cascadeOnDelete();

                $table->unique(['project_id', 'language_code'], 'proj_trans_lang_unique');
            });
        }

        if (!Schema::hasTable('project_images')) {
            Schema::create('project_images', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id');
                $table->string('image_path');
                $table->string('caption')->nullable();
                $table->integer('order')->default(0);
                $table->timestamps();

                $table->foreign('project_id', 'fk_pi_proj_id')
                      ->references('id')
                      ->on('projects')
                      ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('project_images');
        Schema::dropIfExists('project_translations');
        Schema::dropIfExists('projects');
    }
};
