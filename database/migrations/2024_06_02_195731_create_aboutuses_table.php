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
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->id();
            $table->string('stitle_1');
            $table->string('mtitle_1');
            $table->text('description_1');
            $table->string('image_1');
            $table->string('stitle_2');
            $table->string('mtitle_2');
            $table->text('description_2');
            $table->string('image_2');
            $table->string('stitle_3');
            $table->string('mtitle_3');
            $table->text('description_3');
            $table->string('image_3');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutuses');
    }
};
