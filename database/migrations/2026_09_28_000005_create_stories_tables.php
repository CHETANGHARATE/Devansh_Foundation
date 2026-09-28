<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('person_name');
            $table->string('person_role_or_location')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('story_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')->constrained('stories')->cascadeOnDelete();
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

            $table->unique(['story_id', 'language_code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('story_translations');
        Schema::dropIfExists('stories');
    }
};
