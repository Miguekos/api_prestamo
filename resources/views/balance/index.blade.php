@extends('layouts.app')

@section('content')
<!--<div class="col-md-4">-->
<!--  <div class="panel panel-default">-->
<!--    <div class="panel-heading"><h4>Cuentas</h4><small><u>Nota:</u> En este momento no se esta sumando la cantidad con la que se incia el dia.</a></small></div>-->

<!--    <div class="panel-body">-->
<!--      <strong><u>Recaudado:</u> </strong>{{ $suma }} ./s<br>-->
<!--      <strong><u>Ganancia de {{ auth()->user()->name }}:</u> </strong>{{ $total }} ./s<br>-->
<!--      <strong><u>A entregar:</u> </strong>{{ $entregar }} ./s<br>-->
<!--      <strong><u>Porcentaje:</u> </strong>{{ $porcent }} %<br>-->
<!--    </div>-->
<!--    <div class="panel-footer">-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<div class="col-md-12">
  <div class="panel panel-default">
    <!--<div class="panel-heading"><h4>Balance de {{ auth()->user()->name }} <a class="pull-right">{{ $total }} ./s</a> </h4></div>-->
    <div class="panel-heading"><h4>Balance de {{ auth()->user()->name }} <a class="pull-right"></a> </h4></div>
    <div class="panel-body">
      <div class="table-responsive">
      <table id="example" class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Deuda</th>
            <th class="alert-success">Abono</th>
            <th>Fecha</th>
            <th>En Caja</th>
            <th>Empleado:</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pago as $pagos)
          <tr>
            <td>{{ $pagos->id }}</td>
            <td>{{ $pagos->nombre }}</td>
            <td>{{ $pagos->deuda }} ./s</td>
            <td>{{ $pagos->abono }} ./s</td>
            <td>{{ $pagos->fecha }}</td>
            <td>{{ $pagos->a_caja }}</td>
            <td>{{ $pagos->usuario }}</td>
          </tr>
          @endforeach
        </tbody>
        <!-- <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td>Total a entregar:</td>
            <td>{{ $entregar }} ./s</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td>Total Gancia {{ $porcent }}%:</td>
            <td>{{ $total }} ./s</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot> -->
      </table>
      </div>
    </div>

    <div class="panel-footer">
    </div>

  </div>
</div>
@endsection
