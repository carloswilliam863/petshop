<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pedido_entradas', function (Blueprint $table) {
        $table->renameColumn('fornecedor', 'marca');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('pedido_entradas', function (Blueprint $table) {
        $table->renameColumn('marca', 'fornecedor');
    });
}

};
