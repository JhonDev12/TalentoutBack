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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->min(4)->regex('/^[a-zA-Z]+$/');
            $table->string('apellido', 30)->min(4)->regex('/^[a-zA-Z]+$/');
            $table->date('fecha_nacimiento');
            $table->string('tipo_usuario', 30);
            $table->string('sexo', 12)->regex('/^[a-zA-Z]{3,12}$/')->min(3);
            $table->string('telefono', 10)->regex('/^[0-9]{8,10}$/')->min(8);
            $table->string('email', 40)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
