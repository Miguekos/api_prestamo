@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Nuevo Cliente</h4></div>

                <div class="panel-body">
                  <form action="{{ route('cliente.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" autofocus name="nombre" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="telf">DNI</label>
                        <input type="text" class="form-control" name="dni" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="{{ date('Y-m-d') }}" id="fecha">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="dni">Telf</label>
                        <input type="text" class="form-control" name="telf" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="prestamo">Prestamo</label>
                        <input type="number" class="form-control" onkeyup="calcular()" id="prestamo" name="prestamo" placeholder="">
                        <input type="hidden" class="form-control" id="deuda" name="deuda" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="interes">Interes %</label>
                        <input type="number" class="form-control" onkeyup="calcular()" value="20" readonly id=interes name="interes" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="">Monto a Pagar</label>
                        <input type="text" class="form-control" readonly name="monto_a_apagar" id="total" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="">Dias del prestamo</label>
                        <input type="number" class="form-control" onkeyup="pago_por_dia()" id="dias" value="24" readonly name="dias_para_pagar" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="">Pago por dia</label>
                        <input type="text" class="form-control" readonly id="totaldias" name="pago_dia" placeholder="">
                      </div>

                    </div>
                    <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-success btn-block" value="Guardar">
                    </div>
                    <input type="hidden" name="agregado" value="{{ auth()->user()->name }}">
                    <input type="hidden" name="agregado_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="abono_id" value="0">
                  </form>
                </div>

                <div class="panel-footer">
                  miguekos1233@gmail.com
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">

function calcular(){
  var num1 = document.getElementById("prestamo").value;
  var num2 = document.getElementById("interes").value;
  var valor1 = num1 / 100;
  var valor2 = valor1 * num2;
  var total_a_pagar = parseFloat(valor2) + parseFloat(num1);
  document.getElementById("total").value = total_a_pagar;
  document.getElementById("deuda").value = total_a_pagar;
  console.log("valor1: " + valor1);
  console.log("Num1: " + num1);
  console.log("Num2: " + num2);
  var num3 = document.getElementById("total").value;
  var num4 = document.getElementById("dias").value;
  var total_dias = parseFloat(num3) / parseFloat(num4);
  // console.log("Total Dias: " + total_dias);
  document.getElementById("totaldias").value = total_dias.toFixed(2);
};

function pago_por_dia(){
  var num3 = document.getElementById("total").value;
  var num4 = document.getElementById("dias").value;
  var total_dias = parseFloat(num3) / parseFloat(num4);
  // console.log("Total Dias: " + total_dias);
  document.getElementById("totaldias").value = total_dias.toFixed(2);
};
</script>
