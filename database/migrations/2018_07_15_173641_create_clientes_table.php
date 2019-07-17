<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('dni')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha')->nullable();
            $table->string('telf')->nullable();
            $table->float('prestamo')->nullable();
            $table->float('deuda')->nullable();
            $table->float('interes')->nullable();
            $table->float('monto_a_apagar')->nullable();
            $table->float('dias_para_pagar')->nullable();
            $table->float('pago_dia')->nullable();
            $table->datetime('fecha_limite')->nullable();
            $table->text('comentario')->nullable();
            $table->text('agregado')->nullable();
            $table->text('agregado_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
