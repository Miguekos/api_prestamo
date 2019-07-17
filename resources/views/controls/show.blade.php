@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Control de Clientes</h4></div>
                <div class="panel-body">

                  <table class="table">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Prestamo</td>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- @foreach($control as $controls)
                      <tr>
                        <td>{{ $controls->id }}</td>
                        <td>{{ $controls->nombre }}</td>
                        <td>{{ $controls->dni }}</td>
                        <td>{{ $controls->prestamo }}</td>
                      </tr>
                    </tbody>
                    @endforeach -->
                  </table>
                </div>
                <div class="panel-footer">
                  <small>miguekos1233@gmail.com</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
