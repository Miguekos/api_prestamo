@extends('layouts.app')

@section('content')

    <div class="container-fluid">
      <div class="row">
    <h1 style="color: white;" class="text-center panel-heading">Resultados de la fecha {{ $inicio }} a la fecha {{ $fin }}</h1>
        <div class="col-md-8 col-md-offset-3">
          <br>
          <div class="form-group col-md-4">
            <label style="color: white;">Total deudas de clientes</label>
             <input class="form-control" type="text" readonly value="{{ number_format($deuda, 2) }}">
          </div>

          <div class="form-group col-md-4">
            <label style="color: white;">Total Prestamos a clientes</label>
             <input class="form-control" type="text" readonly value="{{ number_format($prestado, 2) }}">
          </div>
        </div>
        </div>
        

        <div class="panel panel-body">
        <div class="table-responsive">
          <table id="example" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Recaudado</th>
                <th>Ganancia</th>
                <th>A entregar</th>
                <th>Deposito</th>
                <th>Retiro</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reporte as $reportes)
              <tr>
                <td>{{ $reportes->id }}</td>
                <td>{{ $reportes->usuario }}</td>
                <td>{{ $reportes->recaudado }}</td>
                <td>{{ $reportes->ganancia }}</td>
                <td>{{ $reportes->entregar }}</td>
                <td>{{ $reportes->deposito }}</td>
                <td>{{ $reportes->retiro }}</td>
                <td>{{ $reportes->fecha }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        
      </div>
    </div>


    <div class="container-fluid">
      <div class="row">
    <h1 style="color: white;" class="text-center panel-heading">Depositos y Retiros de: {{ $inicio }} hasta {{ $fin }}</h1>
        <div class="panel panel-body">
        <div class="table-responsive">
          <table id="example2" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Monto</th>
                <th>Accion</th>
                <th>Motivo</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              @foreach($abonos as $reportes)
              <tr>
                <td>{{ $reportes->id }}</td>
                <td>{{ $reportes->monto }}</td>
                <td>{{ $reportes->accion }}</td>
                <td>{{ $reportes->motivo }}</td>
                <td>{{ $reportes->fecha }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
        </div>


      </div>
    </div>

@endsection
