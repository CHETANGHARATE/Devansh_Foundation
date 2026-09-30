<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('donation_cases') && !Schema::hasColumn('donation_cases', 'is_demo')) {
            Schema::table('donation_cases', function (Blueprint $table) {
                $table->boolean('is_demo')->default(false)->after('status');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('donation_cases') && Schema::hasColumn('donation_cases', 'is_demo')) {
            Schema::table('donation_cases', function (Blueprint $table) {
                $table->dropColumn('is_demo');
            });
        }
    }
};
