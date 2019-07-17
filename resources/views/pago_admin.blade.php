@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading"><h4>Balance de {{ auth()->user()->name }}</h4></div>

  <div class="panel-body">
    <div class="table-responsive">
    <table id="example" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Total Recauado</th>
          <th>A entregar</th>
          <th>Pago Empleado</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $pagos)
        <tr>
          <td>{{ $pagos->usuario }}</td>
          <td>{{ number_format($pagos->recaudado, 2) }}  ./s</td>
          <td>{{ number_format($pagos->recaudado - $pagos->pago_empleado, 2) }}  ./s</td>
          <td>{{ number_format($pagos->pago_empleado, 2) }} ./s</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
  <div class="panel-footer">
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading"><h4>Detalle de abonos</h4></div>
  <div class="panel-body">
    <div class="table-responsive">
    <table id="example2" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Cliente</th>
          <th>Abonó</th>
          <th>Fecha</th>
          <th>Atendido por:</th>
          <th>Accion</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($recaudo as $recaudos)
        <tr>
          <td>{{ $recaudos->id }}</td>
          <td>{{ $recaudos->nombre }}</td>
          <td>{{ $recaudos->abono }}  ./s</td>
          <td>{{ $recaudos->created_at }}</td>
          <td>{{ $recaudos->usuario }}</td>
            <td>
            <form class="" action="{{ route('eliminarcontrol.destroy',$recaudos->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="submit" class="btn btn-xs btn-danger" value="Eliminr">
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>

  </div>
  <div class="panel-footer">
  </div>


</div>
@endsection
