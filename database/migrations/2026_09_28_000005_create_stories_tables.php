<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('stories')) {
            Schema::create('stories', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable();
                $table->string('slug')->unique();
                $table->string('image')->nullable();
                $table->string('person_name');
                $table->string('person_role_or_location')->nullable();
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_published')->default(true);
                $table->integer('order')->default(0);
                $table->timestamps();

                $table->foreign('project_id', 'fk_story_proj_id')
                      ->references('id')
                      ->on('projects')
                      ->nullOnDelete();
            });
        }

        if (!Schema::hasTable('story_translations')) {
            Schema::create('story_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('story_id');
                $table->string('language_code', 5);
                $table->string('title');
                $table->text('quote')->nullable();
                $table->longText('story');
                $table->text('challenge')->nullable();
                $table->text('support_received')->nullable();
                $table->text('outcome')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->timestamps();

                $table->foreign('story_id', 'fk_st_story_id')
                      ->references('id')
                      ->on('stories')
                      ->cascadeOnDelete();

                $table->unique(['story_id', 'language_code'], 'story_trans_lang_unique');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('story_translations');
        Schema::dropIfExists('stories');
    }
};
