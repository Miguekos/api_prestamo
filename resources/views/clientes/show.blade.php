@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
            <h4 class="panel-heading text-center">Detalles de:</b> <u>{{ $clientes->nombre }}</u></h4>
              <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><b>Datos</h4>
                </div>
                <div class="panel-body">
                    <strong>Nombre: </strong> {{ $clientes->nombre }}<br>
                    <strong>Dni: </strong> {{ $clientes->dni }}<br>
                    <strong>Direccion: </strong> {{ $clientes->direccion }}<br>
                    <strong>Fecha: </strong> {{ $clientes->fecha }}<br>
                    <strong>Telefono: </strong> {{ $clientes->telf }}<br>
                    <strong>Prestamo: </strong> {{ $clientes->prestamo }} ./S<br>
                    <strong class="alert-danger">Deuda: </strong> {{ $clientes->deuda }} ./S<br>
                    <strong>Interes: </strong> {{ $clientes->interes }}<br>
                    <strong>Monto a pagar: </strong> {{ $clientes->monto_a_apagar }}<br>
                    <strong>Dias para pagar: </strong> {{ $clientes->dias_para_pagar }}<br>
                    <strong>Pago por dia:</strong> {{ $clientes->pago_dia }}<br>
                    <strong>Agregado por: </strong> {{ $clientes->agregado }}<br>
                </div>
                <div class="panel-footer">
                    <small>miguekos1233@gmail.com</small>
                </div>
        </div>
    </div>
</div>



@endsection
