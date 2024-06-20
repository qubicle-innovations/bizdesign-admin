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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->foreign('category_id')->references('id')->on('service_categories')->onDelete('cascade');
            $table->index('category_id');
            $table->string('logo');
            $table->string('back_image');
            $table->string('title');
            $table->text('description');
            $table->string('stitle_sub1')->nullable();
            $table->string('mtitle_sub1')->nullable();
            $table->string('title_sub2')->nullable();
            $table->text('description_sub2')->nullable();
            $table->string('image_sub2')->nullable();
            $table->text('description2_sub2')->nullable();
            $table->text('points_sub2')->nullable();
            $table->string('title_sub3')->nullable();
            $table->text('description_sub3')->nullable();
            $table->string('image_sub3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
