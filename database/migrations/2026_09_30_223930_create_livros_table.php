<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id('idlivro');
            $table->string('titulo');
            $table->string('isbn')->nullable();
            $table->year('ano_publicacao')->nullable();
            $table->string('descricao')->nullable();
            $table->string('paginas')->nullable();

            $table->unsignedBigInteger('idautor');
            $table->foreign('idautor')->
            references('idautor')->on('autores');
            
            $table->unsignedBigInteger('idcategoria');
            $table->foreign('idcategoria')->
            references('idcategoria')->on('categorias');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
