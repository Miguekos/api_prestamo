@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading"><h4>Control por abonar</h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Total prestado
                        </td>
                        <td>%</td>
                        <td class="alert-danger">Deuda</td>
                        <td>Accion</td>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($cliente as $clientes)
                      <tr>
                        <td>{{ $clientes->id }}</td>
                        <td>{{ $clientes->name }}</td>
                        <td>{{ $clientes->dni }}</td>
                        <td>{{ $clientes->monto_a_apagar . " S/." }}</td>
                        <td>{{ $clientes->interes}}</td>
                        <td>{{ $clientes->deuda . " S/." }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal{{ $clientes->id }}">Abonar</a>
                        </td>
                        @include('templates.modal')
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
                <div class="panel-footer">
                  <small>miguekos1233@gmail.com</small>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading"><h4>Cliente que abonaron</h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Total prestado
                        </td>
                        <td>%</td>
                        <td class="alert-danger">Deuda</td>
                        <td>Accion</td>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($abonos as $abono)
                      <tr>
                        <td>{{ $abono->id }}</td>
                        <td>{{ $abono->name }}</td>
                        <td>{{ $abono->dni }}</td>
                        <td>{{ $abono->monto_a_apagar . " S/." }}</td>
                        <td>{{ $abono->interes}}</td>
                        <td>{{ $abono->deuda . " S/." }}</td>
                        <td>
                          <form action="{{ route('control.destroy',$abono->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
                <div class="panel-footer">
                  <small>miguekos1233@gmail.com</small>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<form action="{{ route('limpiar_cliente') }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  <input type="submit" class="btn btn-success btn-block" value="Reinicar Abonos">
</form>
<hr>
@endsection
