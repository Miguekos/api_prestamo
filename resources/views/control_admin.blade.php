@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Control de Clientes</h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Total a pagar</td>
                        <td>%</td>
                        <td class="alert-danger">Deuda</td>
                        <td>Atendido por:</td>
                        {{-- <td>Accion</td> --}}
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($cliente as $clientes)
                      <tr>
                        <td>{{ $clientes->id }}</td>
                        <td>{{ $clientes->nombre }}</td>
                        <td>{{ $clientes->dni }}</td>
                        <td>{{ $clientes->monto_a_apagar . " S/." }}</td>
                        <td>{{ $clientes->interes}}</td>
                        <td>{{ $clientes->deuda . " S/." }}</td>
                        <td>{{ $clientes->agregado}}</td>
                        {{-- <td>
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal{{ $clientes->id }}">Abonar</a>
                        </td> --}}
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
@endsection
