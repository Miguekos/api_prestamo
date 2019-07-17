@extends('layouts.app')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <form action="{{ route('reporte') }}" method="post">

          {{ csrf_field() }}
          <div class="col-md-8 col-md-offset-3">

            <div class="form-group col-md-4">
              <label style="color: white;">Inicio</label>
            	 <input class="form-control" type="date" name="inicio">
            </div>

            <div class="form-group col-md-4">
              <label style="color: white;">Fin</label>
            	 <input class="form-control" type="date" name="fin">
            </div>

          </div>

          <div class="form-group col-md-4 col-md-offset-4">
            <select class="form-control" name="colaborador">
              <option value="0">--SELECCIONE UN COLABORADOR--</option>
              @foreach($colaboradors as $colaborador)
              <option value="{{ $colaborador->id }}">{{ $colaborador->name }}</option>
              @endforeach
            </select>
          </div>

            <div class="form-group col-md-4 col-md-offset-4">
              <input type="submit" class="btn btn-info btn-block" value="Buscar">
            </div>

        </form>
      </div>
    </div>

@endsection
