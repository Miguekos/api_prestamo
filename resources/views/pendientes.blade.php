@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading"><h4> Pendientes del dia {{ date('d-m-Y', strtotime('-1 day')) }}</h4></div>
  <div class="panel-body">
    <div class="table-responsive">
    <table id="example" class="table table-bordered table-hover">
      <thead>
        <tr>
          <td>#</td>
          <td>Nombre</td>
          <td>DNI</td>
          <td>telf</td>
          <td class="alert-danger">Deuda</td>
          <td>Agregado Por:</td>
          <td>Ultimo abono</td>
        </tr>
      </thead>
      <tbody>
      @foreach($pendienteayer as $clientes)
        <tr>
          <td>{{ $clientes->id }}</td>
          <td>{{ $clientes->nombre }}</td>
          <td>{{ $clientes->telf }}</td>
          <td>{{ $clientes->dni }}</td>
          <td>{{ number_format($clientes->deuda, 2) }}</td>
          <td>{{ $clientes->agregado }}</td>
          <td>{{ $clientes->updated_at }}</td>
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
  <div class="panel-heading"><h4> Pendientes del dia {{ date('d-m-Y', strtotime('-2 day')) }}</h4></div>
  <div class="panel-body">
    <div class="table-responsive">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
        <tr>
          <td>#</td>
          <td>Nombre</td>
          <td>DNI</td>
          <td>telf</td>
          <td class="alert-danger">Deuda</td>
          <td>Agregado Por:</td>
          <td>Ultimo abono</td>
        </tr>
      </thead>
      <tbody>
      @foreach($pendienteante as $clientes)
        <tr>
          <td>{{ $clientes->id }}</td>
          <td>{{ $clientes->nombre }}</td>
          <td>{{ $clientes->telf }}</td>
          <td>{{ $clientes->dni }}</td>
          <td>{{ number_format($clientes->deuda, 2) }}</td>
          <td>{{ $clientes->agregado }}</td>
          <td>{{ $clientes->updated_at }}</td>
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
