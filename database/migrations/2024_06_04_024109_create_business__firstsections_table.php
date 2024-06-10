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
        Schema::create('business__firstsections', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id')->foreign('business_id')->references('id')->on('business_categories')->onDelete('cascade');
            $table->index('business_id'); 
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business__firstsections');
    }
};
