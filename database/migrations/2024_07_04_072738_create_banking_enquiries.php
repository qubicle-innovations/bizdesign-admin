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
        Schema::create('banking_enquiries', function (Blueprint $table) {
            $table->id();
            $table->enum('existing_business', ['Yes', 'No'])->nullable();
            $table->string('company_name')->nullable();
            $table->string('registered_in')->nullable();
            $table->enum('residence_visa', ['Yes', 'No'])->nullable();
            $table->enum('business_office', ['Yes', 'No'])->nullable();
            $table->enum('bank_statement', ['Yes', 'No'])->nullable();
            $table->text('engaged_activities')->nullable();
            $table->enum('proof_address', ['Yes', 'No'])->nullable();
            $table->text('work_countries')->nullable();
            $table->enum('biz_client', ['Yes', 'No'])->nullable();
            $table->text('currencies_required')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_nationality')->nullable();
            $table->string('client_comments')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banking_enquiries');
    }
};
