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
        Schema::create('expertise__firstsections', function (Blueprint $table) {
            $table->id();
            $table->integer('expertise_id')->foreign('expertise_id')->references('id')->on('expertises')->onDelete('cascade');
            $table->index('expertise_id'); 
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
        Schema::dropIfExists('expertise__firstsections');
    }
};
