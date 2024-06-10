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
        Schema::create('service_second_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id')->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->index('service_id');
            $table->string('title');
            $table->text('points');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_second_sections');
    }
};
