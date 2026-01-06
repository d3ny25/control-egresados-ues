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
        Schema::create('egresados', function (Blueprint $table) {
            $table->id(); // id INT auto_increment PRIMARY KEY
            $table->char('matricula', 8)->unique(); // char(8) NOT NULL UNIQUE
            $table->string('nombre_completo', 150); // varchar(150) NOT NULL
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']); // enum NOT NULL
            $table->string('domicilio', 255)->nullable(); // varchar(255) NULL
            $table->string('telefono', 15)->nullable(); // varchar(15) NULL
            $table->string('correo', 100)->nullable(); // varchar(100) NULL
            $table->foreignId('carrera_id')->constrained('carreras'); // relación con carreras
            $table->foreignId('generacion_id')->constrained('generaciones'); // relación con generaciones
            $table->foreignId('estatus_id')->constrained('estatus'); // relación con estatus
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egresados');
    }
};
