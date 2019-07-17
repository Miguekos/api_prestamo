<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable;
            $table->string('cliente_id')->nullable;
            $table->string('prestamo')->nullable;
            $table->string('deuda')->nullable;
            $table->string('abono')->nullable;
            $table->date('fecha')->nullable;
            $table->string('a_caja')->nullable;
            $table->string('usuario')->nullable;
            $table->string('user_id')->nullable;
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
        Schema::dropIfExists('pagos');
    }
}
