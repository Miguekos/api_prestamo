@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Clientes <a class="pull-right btn btn-sm btn-success" href="{{ url('/cliente/create') }}">Nuevo Cliente</a></h4></div>
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
                        <td>Fecha del prestamo</td>
                        <td width="20%">Accion</td>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($cliente as $clientes)
                      <tr>
                        <td>{{ $clientes->id }}</td>
                        <td>{{ $clientes->nombre }}</td>
                        <td>{{ $clientes->telf }}</td>
                        <td>{{ $clientes->dni }}</td>
                        <td>{{ number_format($clientes->deuda, 2) }}</td>
                        <td>{{ $clientes->agregado }}</td>
                        <td>{{ $clientes->fecha }}</td>
                        <td width="20%">
                        @if(auth()->user()->user_id == 1)
                          <form action="{{ route('cliente.destroy',$clientes->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                                <a href="{{ route('cliente.show',$clientes->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('cliente.edit',$clientes->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                          </form>
                          @else
                          <a href="{{ route('cliente.show',$clientes->id) }}" class="btn btn-sm btn-info">Ver</a>
                          @endif
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
@if(auth()->user()->user_id == 1)
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><h4>Clientes sin deudas <a class="pull-right btn btn-sm btn-danger" href="{{ url('/limpiarClientes') }}">Eliminar Clientes</a></h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>telf</td>
                        <td class="alert-danger">Deuda</td>
                        <td>Agregado Por:</td>
                        <td>Fecha del prestamo</td>
                        <td width="20%">Accion</td>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($clientesd as $clientes)
                      <tr>
                        <td>{{ $clientes->id }}</td>
                        <td>{{ $clientes->nombre }}</td>
                        <td>{{ $clientes->telf }}</td>
                        <td>{{ $clientes->dni }}</td>
                        <td>{{ number_format($clientes->deuda, 2) }}</td>
                        <td>{{ $clientes->agregado }}</td>
                        <td>{{ $clientes->fecha }}</td>
                        <td width="20%">
                        @if(auth()->user()->user_id == 1)
                          <form action="{{ route('cliente.destroy',$clientes->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                                <a href="{{ route('cliente.show',$clientes->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('cliente.edit',$clientes->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                          </form>
                          @else
                          <a href="{{ route('cliente.show',$clientes->id) }}" class="btn btn-sm btn-info">Ver</a>
                          @endif
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
@else
@endif
@endsection
