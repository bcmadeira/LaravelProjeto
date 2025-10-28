<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 100);
            $table->date('dia')->nullable();
            $table->time('horario')->nullable();
            $table->boolean('status')->default(false);
            $table->string('observacao')->nullable();
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
};
