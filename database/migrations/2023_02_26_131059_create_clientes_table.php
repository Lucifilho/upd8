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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table -> string('cpf')->nullable()->default(NULL);
            $table -> string('nome')->nullable()->default(NULL);
            $table -> date('dataNasc')->nullable()->default(NULL);;
            $table -> string('sexo')->nullable()->default(NULL);;
            $table -> string('endereco')->nullable()->default(NULL);;
            $table -> string('estado')->nullable()->default(NULL);;
            $table -> string('cidade')->nullable()->default(NULL);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
