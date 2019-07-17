@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <h1 style="color: white;" class="text-center panel-heading">Cuentas de {{ auth()->user()->name }}</h1>
    <div class="row">
      <form action="{{ route('report.store') }}" method="post">
        {{ csrf_field() }}
        <div id="sombra" class="form-group col-md-12">
          <input class="form-control" type="hidden" name="usuario" value="{{ auth()->user()->name }}">
          <input class="form-control" type="hidden" name="usuario_id" value="{{ auth()->user()->id }}">
          <div class="col-md-2">
            <label style="color: white;" for="">Recaudado</label>
            <input class="form-control" type="number" step="any" readonly name="recaudado" value="{{  round($recaudado, 2) }}">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">Ganancia</label>
            <input class="form-control" type="number" step="any" readonly name="ganancia" value="{{ round($ganancia, 2) }}">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">A entregar</label>
            <input class="form-control" type="number" step="any" readonly name="entregar" value="{{ round($entregar, 2) }}">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">Deposito</label>
            <input class="form-control" type="number" step="any" readonly name="deposito" value="{{ $inicio_suma }}">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">Retiro</label>
            <input class="form-control" type="number" step="any" readonly name="retiro" value="{{ $fin_resta }}">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">Fecha</label>
            <input class="form-control" type="date" readonly name="fecha" value="{{ date('Y-m-d') }}">
            <br>
          </div>
              <input class="btn btn-success btn-block" type="submit" value="Cerrar cuenta">
        </div>
      </form>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Cierres diarios </h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Colaborador</th>
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
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Depositos<a class="pull-right">{{ $inicio_suma }} ./s</a> </h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example1" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Dia</th>
                        <th>Tipo</th>
                        <th>Motivo</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($inicio as $montos)
                        <tr>
                          <td>{{ $montos->id }}</td>
                          <td>{{ $montos->monto }}</td>
                          <td>{{ $montos->created_at }}</td>
                          <td>{{ $montos->accion }}</td>
                          <td>{{ $montos->motivo }}</td>
                          <td width="20%">
                            <form action="{{ route('cierre.destroy',$montos->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                  <a href="{{ route('cierre.edit',$montos->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                  <!-- <input type="submit" class="btn btn-sm btn-danger" value="Eliminar"> -->
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


<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Retiros<a class="pull-right">{{ $fin_resta }} ./s</a> </h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example2" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Dia</th>
                        <th>Motivo</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($fin as $montos)
                      <tr>
                        <td>{{ $montos->id }}</td>
                        <td>{{ $montos->monto }}</td>
                        <td>{{ $montos->created_at }}</td>
                        <td>{{ $montos->motivo }}</td>
                        <td width="20%">
                          <form action="{{ route('cierre.destroy',$montos->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                                <a href="{{ route('cierre.edit',$montos->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <!-- <input type="submit" class="btn btn-sm btn-danger" value="Eliminar"> -->
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
@endsection
