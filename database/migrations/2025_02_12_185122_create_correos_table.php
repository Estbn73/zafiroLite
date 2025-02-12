<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('correos', function (Blueprint $table) {
            $table->id();
            $table->string('destinatario');
            $table->string('asunto');
            $table->text('mensaje');
            $table->string('adjunto')->nullable(); // Para el archivo adjunto
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('correos');
    }
};

