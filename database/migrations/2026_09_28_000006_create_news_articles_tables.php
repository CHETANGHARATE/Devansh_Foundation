<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('news_articles')) {
            Schema::create('news_articles', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('category')->default('Update'); // Update, Event, Announcement, Initiative
                $table->string('featured_image')->nullable();
                $table->date('published_at')->nullable();
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_published')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('news_article_translations')) {
            Schema::create('news_article_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('news_article_id');
                $table->string('language_code', 5);
                $table->string('title');
                $table->text('short_description')->nullable();
                $table->longText('content');
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->timestamps();

                $table->foreign('news_article_id', 'fk_nat_article_id')
                      ->references('id')
                      ->on('news_articles')
                      ->cascadeOnDelete();

                // Explicit short index name to adhere to MySQL 64-char identifier limit
                $table->unique(['news_article_id', 'language_code'], 'news_art_trans_lang_unique');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('news_article_translations');
        Schema::dropIfExists('news_articles');
    }
};
