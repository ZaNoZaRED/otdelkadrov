<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecializationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название специальности
            $table->string('photo_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('specializations');
    }
}