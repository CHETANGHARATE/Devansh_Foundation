<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('gallery_albums')) {
            Schema::create('gallery_albums', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('title_mr');
                $table->string('title_hi')->nullable();
                $table->string('title_en')->nullable();
                $table->string('category')->default('Community');
                $table->string('cover_image')->nullable();
                $table->integer('order')->default(0);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('gallery_images')) {
            Schema::create('gallery_images', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('gallery_album_id')->nullable();
                $table->unsignedBigInteger('project_id')->nullable();
                $table->string('image_path');
                $table->string('caption_mr')->nullable();
                $table->string('caption_hi')->nullable();
                $table->string('caption_en')->nullable();
                $table->string('category')->default('General');
                $table->integer('order')->default(0);
                $table->timestamps();

                $table->foreign('gallery_album_id', 'fk_gi_album_id')
                      ->references('id')
                      ->on('gallery_albums')
                      ->nullOnDelete();

                $table->foreign('project_id', 'fk_gi_proj_id')
                      ->references('id')
                      ->on('projects')
                      ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
        Schema::dropIfExists('gallery_albums');
    }
};
