<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('donation_cases')) {
            Schema::create('donation_cases', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('beneficiary_name');
                $table->string('category')->default('medical'); // medical, education, emergency, child_welfare
                $table->string('category_icon')->default('baby'); // baby, heart, book-open, stethoscope, accessibility
                $table->string('image')->nullable();
                $table->decimal('target_amount', 12, 2);
                $table->decimal('collected_amount', 12, 2)->default(0);
                $table->string('currency', 10)->default('INR');
                $table->string('expense_label')->default('Treatment Expense');
                $table->string('status', 20)->default('active'); // active, completed, paused, closed
                $table->integer('order')->default(0);
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->string('donation_url')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('donation_case_translations')) {
            Schema::create('donation_case_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('donation_case_id');
                $table->string('language_code', 5);
                $table->string('title');
                $table->string('expense_label')->nullable();
                $table->text('urgent_message')->nullable();
                $table->longText('description')->nullable();
                $table->string('category_name')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->timestamps();

                $table->foreign('donation_case_id', 'fk_dct_case_id')
                      ->references('id')
                      ->on('donation_cases')
                      ->cascadeOnDelete();

                $table->unique(['donation_case_id', 'language_code'], 'case_trans_lang_unique');
            });
        }

        if (Schema::hasTable('donations') && !Schema::hasColumn('donations', 'donation_case_id')) {
            Schema::table('donations', function (Blueprint $table) {
                $table->unsignedBigInteger('donation_case_id')->nullable()->after('project_id');
                $table->foreign('donation_case_id', 'fk_don_case_id')
                      ->references('id')
                      ->on('donation_cases')
                      ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('donations') && Schema::hasColumn('donations', 'donation_case_id')) {
            Schema::table('donations', function (Blueprint $table) {
                $table->dropForeign('fk_don_case_id');
                $table->dropColumn('donation_case_id');
            });
        }

        Schema::dropIfExists('donation_case_translations');
        Schema::dropIfExists('donation_cases');
    }
};
