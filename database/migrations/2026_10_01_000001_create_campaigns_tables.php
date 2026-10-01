<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Campaigns table
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category')->default('General');
            $table->string('featured_image')->nullable();
            $table->decimal('target_amount', 12, 2)->default(0);
            $table->decimal('raised_amount', 12, 2)->default(0);
            $table->string('currency', 10)->default('INR');
            $table->boolean('is_featured')->default(true)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->boolean('is_demo')->default(true)->index();
            $table->string('status', 20)->default('active')->index(); // active, completed, paused, closed
            $table->integer('order')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('donation_url')->nullable();
            $table->timestamps();
        });

        // 2. Campaign Translations table
        Schema::create('campaign_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns')->cascadeOnDelete();
            $table->string('language_code', 10)->index(); // en, mr, hi
            $table->string('title');
            $table->string('title_highlight')->nullable(); // Keyword to highlight in green
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('category_name')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();

            $table->unique(['campaign_id', 'language_code']);
        });

        // 3. Campaign Impacts (4 information boxes per campaign)
        Schema::create('campaign_impacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns')->cascadeOnDelete();
            $table->string('icon')->default('users'); // Lucide / SVG icon name
            $table->string('badge_color', 20)->default('green'); // green, blue, orange, red
            $table->boolean('is_primary')->default(false); // First box with numeric metric
            $table->string('metric_value')->nullable(); // e.g. "80", "500", "50", "100"
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 4. Campaign Impact Translations
        Schema::create('campaign_impact_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_impact_id')->constrained('campaign_impacts')->cascadeOnDelete();
            $table->string('language_code', 10)->index();
            $table->string('label'); // e.g. "Beneficiaries", "Mobility Aids"
            $table->string('sublabel')->nullable();
            $table->timestamps();

            $table->unique(['campaign_impact_id', 'language_code'], 'camp_imp_trans_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaign_impact_translations');
        Schema::dropIfExists('campaign_impacts');
        Schema::dropIfExists('campaign_translations');
        Schema::dropIfExists('campaigns');
    }
};
