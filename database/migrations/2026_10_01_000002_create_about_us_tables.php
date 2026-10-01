<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations for About Us subpages:
     * - Transparency & Legal Documents
     * - Our Team
     * - Awards & Recognition
     */
    public function up(): void
    {
        // 1. Transparency Documents
        if (!Schema::hasTable('transparency_documents')) {
            Schema::create('transparency_documents', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('document_type')->default('legal');
                $table->string('icon')->default('file-text');
                $table->string('file_path')->nullable();
                $table->string('file_size')->nullable();
                $table->date('document_date')->nullable();
                $table->date('valid_until')->nullable();
                $table->boolean('is_demo')->default(true);
                $table->boolean('is_published')->default(true);
                $table->string('status_label')->default('Sample / Demo Document');
                $table->integer('order')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 1b. Transparency Document Translations
        if (!Schema::hasTable('transparency_document_translations')) {
            Schema::create('transparency_document_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('transparency_document_id')
                    ->constrained('transparency_documents')
                    ->cascadeOnDelete();
                $table->string('language_code', 5);
                $table->string('title');
                $table->text('short_description')->nullable();
                $table->text('description')->nullable();
                $table->string('status_text')->nullable();
                $table->timestamps();

                $table->unique(['transparency_document_id', 'language_code'], 'trans_doc_lang_unique');
            });
        }

        // 2. Team Members
        if (!Schema::hasTable('team_members')) {
            Schema::create('team_members', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('slug')->unique();
                $table->string('photo')->nullable();
                $table->string('email')->nullable();
                $table->string('linkedin_url')->nullable();
                $table->string('twitter_url')->nullable();
                $table->boolean('is_demo')->default(true);
                $table->boolean('is_active')->default(true);
                $table->integer('order')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 2b. Team Member Translations
        if (!Schema::hasTable('team_member_translations')) {
            Schema::create('team_member_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('team_member_id')
                    ->constrained('team_members')
                    ->cascadeOnDelete();
                $table->string('language_code', 5);
                $table->string('name');
                $table->string('role');
                $table->text('bio')->nullable();
                $table->timestamps();

                $table->unique(['team_member_id', 'language_code'], 'team_member_lang_unique');
            });
        }

        // 3. Awards & Recognitions
        if (!Schema::hasTable('awards')) {
            Schema::create('awards', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('year', 10);
                $table->string('category')->default('General');
                $table->string('icon')->default('award');
                $table->string('certificate_image')->nullable();
                $table->boolean('is_demo')->default(true);
                $table->boolean('is_published')->default(true);
                $table->integer('order')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 3b. Award Translations
        if (!Schema::hasTable('award_translations')) {
            Schema::create('award_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('award_id')
                    ->constrained('awards')
                    ->cascadeOnDelete();
                $table->string('language_code', 5);
                $table->string('title');
                $table->string('category_name')->nullable();
                $table->text('description')->nullable();
                $table->string('conferred_by')->nullable();
                $table->timestamps();

                $table->unique(['award_id', 'language_code'], 'award_lang_unique');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('award_translations');
        Schema::dropIfExists('awards');
        Schema::dropIfExists('team_member_translations');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('transparency_document_translations');
        Schema::dropIfExists('transparency_documents');
    }
};
