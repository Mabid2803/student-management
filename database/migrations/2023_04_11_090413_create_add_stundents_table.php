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
        Schema::create('add_stundents', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('fatherName');
            $table->text('email');
            $table->text('phone');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('classId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_stundents');
    }
};
