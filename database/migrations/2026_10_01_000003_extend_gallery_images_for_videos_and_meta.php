<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('gallery_images')) {
            Schema::table('gallery_images', function (Blueprint $table) {
                if (!Schema::hasColumn('gallery_images', 'media_type')) {
                    $table->string('media_type', 20)->default('image')->after('image_path');
                }
                if (!Schema::hasColumn('gallery_images', 'title_mr')) {
                    $table->string('title_mr')->nullable()->after('media_type');
                    $table->string('title_hi')->nullable()->after('title_mr');
                    $table->string('title_en')->nullable()->after('title_hi');
                }
                if (!Schema::hasColumn('gallery_images', 'description_mr')) {
                    $table->text('description_mr')->nullable()->after('title_en');
                    $table->text('description_hi')->nullable()->after('description_mr');
                    $table->text('description_en')->nullable()->after('description_hi');
                }
                if (!Schema::hasColumn('gallery_images', 'video_url')) {
                    $table->string('video_url', 500)->nullable()->after('description_en');
                }
                if (!Schema::hasColumn('gallery_images', 'video_path')) {
                    $table->string('video_path', 500)->nullable()->after('video_url');
                }
                if (!Schema::hasColumn('gallery_images', 'thumbnail_path')) {
                    $table->string('thumbnail_path', 500)->nullable()->after('video_path');
                }
                if (!Schema::hasColumn('gallery_images', 'alt_text')) {
                    $table->string('alt_text')->nullable()->after('thumbnail_path');
                }
                if (!Schema::hasColumn('gallery_images', 'is_active')) {
                    $table->boolean('is_active')->default(true)->after('order');
                }
            });

            // Make image_path nullable for video items
            try {
                Schema::table('gallery_images', function (Blueprint $table) {
                    $table->string('image_path')->nullable()->change();
                });
            } catch (\Throwable $e) {
                // If the driver does not support column modification without doctrine/dbal, ignore silently
            }
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('gallery_images')) {
            Schema::table('gallery_images', function (Blueprint $table) {
                $columns = [
                    'media_type',
                    'title_mr',
                    'title_hi',
                    'title_en',
                    'description_mr',
                    'description_hi',
                    'description_en',
                    'video_url',
                    'video_path',
                    'thumbnail_path',
                    'alt_text',
                    'is_active',
                ];

                foreach ($columns as $column) {
                    if (Schema::hasColumn('gallery_images', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }
    }
};
