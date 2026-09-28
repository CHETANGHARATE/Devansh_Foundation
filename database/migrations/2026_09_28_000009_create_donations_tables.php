<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('donations')) {
            Schema::create('donations', function (Blueprint $table) {
                $table->id();
                $table->string('donor_name');
                $table->string('donor_email');
                $table->string('donor_phone')->nullable();
                $table->string('donor_pan')->nullable();
                $table->text('donor_address')->nullable();
                $table->decimal('amount', 12, 2);
                $table->string('donation_type')->default('one-time'); // one-time, monthly
                $table->string('payment_method')->default('upi_qr'); // upi_qr, gateway, bank_transfer
                $table->string('transaction_id')->nullable();
                $table->string('payment_status')->default('pending'); // pending, successful, failed
                $table->unsignedBigInteger('project_id')->nullable();
                $table->string('receipt_number')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();

                $table->foreign('project_id', 'fk_don_proj_id')
                      ->references('id')
                      ->on('projects')
                      ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
