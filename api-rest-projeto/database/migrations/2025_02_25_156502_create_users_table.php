<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Criação da coluna ID
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null'); // Chave estrangeira
            $table->string('cpf')->unique(); // CPF, deve ser único
            $table->string('name'); // Nome do usuário
            $table->string('phone'); // Telefone do usuário
            $table->string('email')->unique(); // Email do usuário
            $table->string('password'); // Senha do usuário
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Remove a tabela users
    }
};

