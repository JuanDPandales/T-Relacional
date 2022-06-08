<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('SKU')->unique(); // -> Es para darle un id unico a la tabla SKU
            $table->string('descripcion');
            $table->integer('valor');
            $table->string('tienda');
            $table->string('imagen');


            $table->foreignId('id_tienda')
                ->nullable()
                ->constrained('tienda')
                ->cascadeOnUpdate()
                ->nullOnDelete();
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
};
