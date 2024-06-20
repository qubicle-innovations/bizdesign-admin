<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_data', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['old', 'new'])->default('old');
            $table->string('title');
            $table->string('logo');
            $table->string('back_image')->nullable();
            $table->text('description');
            $table->text('detailed_text');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_data');
    }
};
