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
    Schema::create('fornecedores', function (Blueprint $table) {
        $table->id();
        $table->string('razao_social', 150);
        $table->char('cnpj', 14)->unique();
        $table->text('observacoes')->nullable();
        $table->integer('prazo_entrega');
        $table->decimal('limite_credito', 10, 2)->default(0);
        $table->date('data_contrato')->nullable();
        $table->boolean('ativo')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedors');
    }
};
