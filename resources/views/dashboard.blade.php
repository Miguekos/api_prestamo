@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
            @if(auth()->user()->user_id == 1)
            <h4 style="color: white;" class="panel-heading text-center">Bienvenido Administrador</h4>
              <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><b>Detalles de:</b> {{ auth()->user()->name }}</h4>
                </div>
                <div class="panel-body">
                    <strong>Nombre:</strong> {{ auth()->user()->name }}<br>
                    <strong>Email:</strong> {{ auth()->user()->email }}<br>
                    <strong>Rol:</strong> {{ $rol }}<br>
                    <strong>Empleados:</strong> {{ $total_u }}<br>
                    <strong>Clientes:</strong> {{ $total_c }}<br>
                    <strong>Total Recaudado:</strong> {{ number_format($total_r, 2) }} ./S<br>
                    <strong>Total Deudas Por Cobrar:</strong> {{ number_format($total_d, 2) }} ./S<br>
                    <strong class="alert-danger">Clientes con deuda:</strong> {{ number_format($total_dt, 2) }}<br>
                </div>
                <div class="panel-footer">
                    <small>miguekos1233@gmail.com</small>
                </div>
            @else
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><b>Detalles de:</b> {{ auth()->user()->name }}</h4>
                </div>
                <div class="panel-body">
                    <strong>Nombre:</strong> {{ auth()->user()->name }}<br>
                    <strong>Email:</strong> {{ auth()->user()->email }}<br>
                    <strong>Rol:</strong> {{ $rol }}<br>

                    <form action="{{ route('cierre.store') }}" method="post">
                      {{ csrf_field() }}
                      <hr>
                      <div class="form-group col-md-6">
                        <label><u>Depositar:</u></label>
                        <input class="form-control col-md-2" type="number" step="any" name="monto">
                        <input class="form-control col-md-2" type="hidden" name="accion" value="deposito">
                        <input class="form-control col-md-2" type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
                        <input class="form-control col-md-2" type="text" name="motivo" placeholder="Escriba un Motivo">
                        <input class="btn btn-sm btn-success form-control col-md-2" type="submit" value="Deposito">
                        <input class="form-control col-md-2" type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                      </div>
                    </form>
                    <form action="{{ route('cierre.store') }}" method="post">
                      {{ csrf_field() }}

                      <div class="form-group col-md-6">
                        <label><u>Retirar:</u></label>
                        <input class="form-control col-md-2" type="number" step="any" name="monto">
                        <input class="form-control col-md-2" type="hidden" name="accion" value="retiro">
                        <input class="form-control col-md-2" type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
                        <input class="form-control col-md-2" type="text" name="motivo" placeholder="Escriba un Motivo">
                        <input class="btn btn-sm btn-danger form-control col-md-2" type="submit" value="Retiro">
                        <input class="form-control col-md-2" type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                      </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <small>miguekos1233@gmail.com</small>
                </div>
            @endif
            </div>
    </div>
</div>

@endsection
