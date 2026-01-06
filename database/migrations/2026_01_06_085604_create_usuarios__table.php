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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // id INT auto_increment PRIMARY KEY
            $table->string('nombre', 100); // varchar(100) NOT NULL
            $table->string('email', 100)->unique(); // varchar(100) NOT NULL UNIQUE
            $table->string('password', 255); // varchar(255) NOT NULL
            $table->boolean('activo')->default(1); // tinyint(1), default 1
            $table->foreignId('role_id')->constrained('roles'); // int(11), foreign key a roles(id)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
