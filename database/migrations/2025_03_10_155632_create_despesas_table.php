<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migration (criação da tabela).
     */
    public function up(): void
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->string("descricao", 255);
            $table->enum("tipo", ["Casa", "Carro", "Contas", "Outros"]);
            $table->decimal("valor", 10, 2);
            $table->date("data");
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Adiciona o relacionamento com a tabela users
            $table->timestamps();
        });
    }

    /**
     * Reverte a migration (exclui a tabela).
     */
    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};
