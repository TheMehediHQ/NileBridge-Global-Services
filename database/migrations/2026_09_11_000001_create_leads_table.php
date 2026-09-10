<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('customer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('contact_email')->index();
            $table->string('contact_phone', 32)->nullable();
            $table->enum('service_category', [
                'bpo_customer_support',
                'payment_processing',
                'software_engineering',
                'finance_backoffice',
                'digital_marketing',
            ])->index();
            $table->unsignedInteger('team_size_needed')->default(1);
            $table->decimal('estimated_budget', 12, 2)->nullable();
            $table->json('calculator_inputs')->nullable();
            $table->enum('status', [
                'new',
                'contacted',
                'qualified',
                'proposal_sent',
                'won',
                'lost',
            ])->default('new')->index();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->string('source', 64)->default('landing_page');
            $table->text('notes')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Composite indexes for pipeline filtering
            $table->index(['assigned_to', 'status']);
            $table->index(['status', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};

